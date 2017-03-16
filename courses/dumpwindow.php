<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('location: ../index.php?err=restricted');
	die;
}

function get_course_name($id) {
	$conn = new mysqli("coursebuddy.database.windows.net","msadmin","Cb@12345678","codefundo");
	$sql="SELECT * FROM courses where course_id=".$id;
	$row = $conn->query($sql)->fetch_array();
	$conn->close();
	return $row['course_name'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		#promptbox {
			z-index:1;
			margin-left:35%;
			display:none;
		}
		radio {
			-webkit-appearance:radio;
		}
	</style>
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script>
	var tos=0;
	var xml = [];

	function drag(ev) {
	    ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
	    ev.preventDefault();
    	ev.stopPropagation();
    	var data = ev.dataTransfer.getData("text");
    	var child = document.createElement("div");
	    var remBtn = document.createElement("button");
	    var addBtn = document.createElement("button");
	    remBtn.onclick=function() {
    		$(this).parent().remove();
    	};
    	addBtn.onclick=function() {
	    	var xmlhttp = new XMLHttpRequest();
			var restype;
				for(var i=0;i<document.getElementsByName("restype").length;i++) {
					if(document.getElementsByName("restype")[i].checked)
						restype=(document.getElementsByName("restype")[i].value);
				}
    		xmlhttp.onreadystatechange = function () {
    			if(this.readyState===4 && this.status===200)
	    		{
    				$(addBtn).parent().text("Added!!!");
    			}
    		};
    		var x = "<resource type='"+restype+"' course_id='"+document.getElementsByName("course")[0].value+"' name='"+$("#name").val()+"'>"+data+"</resource>";

    		xmlhttp.open("GET","addlinks.php?xml="+x,true);
    		xmlhttp.send();
    	};

    	$(addBtn).css({"float":"right"});
    	$(remBtn).css({"float":"right"});
    	remBtn.appendChild(document.createTextNode("Remove"));
    	addBtn.appendChild(document.createTextNode("Add"));
    	child.appendChild(addBtn);
    	child.appendChild(remBtn);
    	child.appendChild(document.createTextNode(data));

    	$("#link").val(data);
    	$("#name").focus();
    	$("#promptbox").css({"display":"block"});
    	$("#submit").click(function() {
    		var restype;
    		var arr=document.getElementsByName("restype");
			for(var i=0;i<arr.length;i++)
				if(arr[i].checked)
					restype=(arr[i].value);
    		var x = "<resource type='"+restype+"' course_id='"+document.getElementsByName("course")[0].value+"' name='"+$("#name").val()+"'>"+data+"</resource>";
    		xml[tos++]=x;
    		ev.target.appendChild(child);
    	});
	}

	function wrapup() {
		$("#promptbox").css({"display":"none"});
	}
</script>

	<script>
	function allowDrop(ev) {
		if(ev.stopPropagation) ev.stopPropagation();
    	if(ev.preventDefault) ev.preventDefault();
    	return false;
	}
	</script>
</head>
<body>
<div id="promptbox">
	Name: <input type="text" id="name" autofocus><br>
	Link: <input type="text" id="link"><br>

	<input type="radio" name="restype" value="lnote" checked>Lecture Note<br>
	<input type="radio" name="restype" value="prevpaper">Previous Paper<br>
	<input type="radio" name="restype" value="assignment">Assignment<br>
	Course :
	<select name="course" id="course">
		<?php
		$conn = new mysqli("coursebuddy.database.windows.net","msadmin","Cb@12345678","codefundo");
		$sql="SELECT * FROM addedcourses where userid=".$_SESSION['userid'];
		$res = $conn->query($sql);
		$row=$res->fetch_array(MYSQL_ASSOC);
		echo "<option value=".$row['course_id']." selected>".get_course_name($row['course_id'])."</option>";
		while(($row=$res->fetch_array(MYSQL_ASSOC)))
		{
			echo "<option value=".$row['course_id'].">".get_course_name($row['course_id'])."</option>";
		}
		mysqli_data_seek($res,0);
		$conn->close();
		?>
	</select>
	<button id="submit" value="Done!" onclick="wrapup()">Done</button>
</div>
<div id="child"></div>
<div style="border: 1px solid black;min-height:300px;text-align: center;" ondrop="drop(event)" ondragover="allowDrop(event)">
	Drag and drop your links here.<br>
	<b>Note:</b> Dont paste files on your computer here! You have to upload them.<br>
</div><br><br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:(<b>Note</b>: This will remove whatever is in the above box. So save them first.)<br>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload file" name="submit">
    <select name="course">
    	<?php
    	echo "<option value=".$row['course_id']." selected>".get_course_name($row['course_id'])."</option>";
		while(($row=$res->fetch_array(MYSQL_ASSOC)))
		{
			echo "<option value=".$row['course_id'].">".get_course_name($row['course_id'])."</option>";
		}
    	?>
    </select>
</form>	
</body>
</html>