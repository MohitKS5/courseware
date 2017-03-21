<?php
session_start();
//
if(!isset($_SESSION['status']))
{
	header('location: ../index.php?err=restricted');
	die;
}

if(!isset($_POST['course_id']))
{
	header("location: courses.php");
	die;
}
function get_course_name($id) {
    $conn = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","b7603cbccbf2d5","49d472d0","codefundo");
	$sql="SELECT * FROM courses where course_id=".$id;
	$row = $conn->query($sql)->fetch_array();
	$conn->close();
	return $row['course_name'];
}

$myfile = fopen("uploads/".$_SESSION['username']."/links.xml", "r") or die("Unable to open file!");
$xmlstr = "<root>".fread($myfile,filesize("uploads/".$_SESSION['username']."/links.xml"))."</root>";

$resources = simplexml_load_string($xmlstr);
foreach($resources->resource as $res)
{
	if($res['course_id']==$_POST['course_id'])
	{
			?>
		<div style="color: cyan; font-size: 1rem; background-color: rgba(255,255,255,0.8); border-radius: 2rem 0 2rem 0; border:2px groove red; max-width: 30rem;">
		<ul type="disc">
		<li>Name: <?php echo $res["name"]; ?><br>
		Type: <?php echo $res["type"];?><br>
		<a href="<?php echo $res[0]; ?>" target="_blank" style="width: 2rem; background-color: green; text-decoration: none; border-radius: 1rem; color: yellow; width: 5rem; font-size: 2rem;">GO!</a><br>
		</li>
		</ul>
		</div>
		<?php
	}
}

if(file_exists($_SESSION['username']."/".get_course_name($_POST['course_id'])))
{
	$dir = opendir($_SESSION['username']."/".get_course_name($_POST['course_id']));
	    while (false !== ($entry = readdir($dir))) {
        echo "<div><a href='".$entry."' target='_blank'>$entry</a><br></div>";
    }
}
?>
