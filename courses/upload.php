<?php
session_start();
if(!isset($_SESSION['status']))
{
    header('location: ../index.php?err=restricted');
    die;
}
function get_course_name($id) {
    $conn = new mysqli("us-cdbr-azure-southcentral-f.cloudapp.net","b7603cbccbf2d5","49d472d0","codefundo");
    $sql="SELECT * FROM courses where course_id=".$id;
    $row = $conn->query($sql)->fetch_array();
    $conn->close();
    return $row['course_name'];
}

if(!file_exists("uploads/".$_SESSION['username']."/".get_course_name($_POST['course_id'])."/"))
    mkdir("uploads/".$_SESSION['username']."/".get_course_name($_POST['course_id'])."/");


$target_dir = "uploads/".$_SESSION['username']."/".get_course_name($_POST['course_id'])."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc"
&& $imageFileType != "docx" && $imageFileType != "xls" && $imageFileType != "xlsx"
&& $imageFileType != "ppt" && $imageFileType != "pptx") {
    echo "Sorry, only documents, images and spreadsheets are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>