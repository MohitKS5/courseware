<?php 
session_start();
if(!isset($_SESSION['status'])) {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!--Set charset-->
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Set title-->
<title>Course Buddy</title>
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai:500%7CFredoka+One%7CPompiere%7CSource+Code+Pro" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
 <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>




<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body style="overflow:hidden;">

<section id="mainbody">
    <section id="sec1">
      <aside id="sidebar" class="column-left">

      <header>
        
        <div class="top horizontal brandname"><a href="#" style="text-decoration: none; color: white;">Courseware</a><i class="fa fa-home"></i>
          
          <ul id="menu" type="none" class="top">
            <li><a class="smoothscroll" href="#sec1">ME</a></li>
            <li><a  href="../courses/courses.php" class="">Courses</a></li>
            <li><a class="smoothscroll" href="error404.php">Forum</a></li>
            <li><a class="smoothscroll" href="error404.php">Screen Reader</a></li>
          </ul>
      </div>
      </header>

      <nav id="mainnav">
                <div class="mynav grad2" id="mynav">  
                <ul >
                               <li><a href="index.php">Home</a></li>
                               <li><a href="subfiles/change_password.php" target="mainframe">Change Password</a></li>
                               <li><a href="../courses/myfiles.php" target="mainframe">My files</a></li>
                               <li><a href="../logout.php"> Log out</a></li>
                              </ul>
                            </div>
      </nav>
       </aside>
      

      <div class="framed" id="framed">
        <iframe src="http://home.iitk.ac.in/~himnshu/studentsearch/profile.php?username=<?php echo $_SESSION['username'];?>" class="cover" id="mainframe" name="mainframe"></iframe>
    </div>
     </section>
  
    
      
      <footer class="clear">
        <p>&copy; 2017 IITK <a class="smoothscroll" href="http://zypopwebtemplates.com/"></a></p>
      </footer>
    <div class="clear"></div>

</section>

  
</body>
</html>
