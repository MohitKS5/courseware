<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('location: ../index.php?err=restricted');
	die;
}

if(!isset($_GET['q']))
{
	header('location: courses.php');
	die;
}
    $conn = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","b7603cbccbf2d5","49d472d0","codefundo");
if($_GET['q']==="listCourses")
{
	try {
	$sql = "SELECT * FROM courses WHERE institute_id=".$_SESSION['instituteid']." AND semester=".$_GET['sem'];
	$res = $conn->query($sql);
	//$row=$res->fetch_array();
	//echo "<option value=".$row['course_id'].">".$row['course_name']."</option>";
	while(($row=$res->fetch_array()))
	{
		echo "<option value=".$row['course_id'].">".$row['course_name']."</option>";
	}
	die;
	}
	catch(Exception $e)
	{
		header('location: courses.php');
		die;
	}
}
if($_GET['q']==="courseEnq")
{
	if($_GET['course']!=="")
	try {

	$sql = "SELECT * FROM courses WHERE course_id=".$_GET['course'];
	$res = $conn->query($sql);
	$row = $res->fetch_array();
	?>

<section class="Course_Content">
<div>Course Name: <span id="cnd"><?php echo $row['course_name']; ?></span></div>  <!-- Course name display -->

<div>Reference books: <span id="rbd"><?php echo $row['reference']; ?></span></div>  <!-- Referece books display -->
<div>No of lectures a week: <span id="ld"><?php echo $row['lectures']; ?></span></div>  <!-- no of lec display -->
<div>Lab hours per week: <span id="labd"><?php echo $row['labs']; ?></span></div>  <!-- Lab d display -->
<div>Tutorials per week: <span id="td"><?php echo $row['tutorials']; ?></span></div>  <!-- tuts display -->
<div>Course Content: <span id="ccd" class="longText"><?php echo $row['course_content']; ?></span><p style="display: inline; position: absolute; margin-left: 33rem;" onclick="showtxt()">click for more!</p></div>  <!-- Course content display -->
</section>
<script type="text/javascript">
	function showtxt(){
		$(".text_disp").animate({height:"20rem", opacity:1},1000);
	}
</script>
<div class="text_disp"><?php echo $row['course_content']; ?></div>
<?php 
if($_SESSION['currsem']<=$row['semester'])
{
	//Check if taken
	$sql = "SELECT * FROM addedcourses WHERE userid=".$_SESSION['userid']." AND course_id=".$row['course_id'];
	$res = $conn->query($sql);
	if($res->num_rows==1)
		echo "<button  style='color:white; background-color:red; font-weight:bold; margin:1.5rem 0 0 15rem; border-radius:1rem 1rem 0 0; width:15rem; height:2.5rem;' onclick=addrem(".$row['course_id'].",false)>Remove course!</button>";
	else
		echo "<button style='color:white; background-color:green; font-weight:bold; margin:1.5rem 0 0 15rem; border-radius:1rem 1rem 0 0; width:15rem; height:2.5rem;' onclick=addrem(".$row['course_id'].",true)>Add course</button>";
}
?>
	<?php
	} catch(Exception $e) {
		header('location: courses.php');
		die;
	}
}

?>