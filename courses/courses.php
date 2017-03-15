<?php

if(session_status()!=PHP_SESSION_ACTIVE)
  header("location: ../index.php");
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
<title>Code Buddy</title>
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai:500%7CFredoka+One%7CPompiere%7CSource+Code+Pro" rel="stylesheet">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/background_transitions.css" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
 <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

  <div class="debug">
    <label><input type="checkbox"> Debug</label>
  </div>
 

  <div class="parallax">
    <div id="group2" class="P_group">
      <div class="PL PL_base">
        <div class="head1"><span style="font-family: 'Baloo Bhaina', cursive !important; color: orange !important; text-shadow:none;">COURSES</span><BR>Welcome To I Semester Courses</div>
      </div>
      <div class="PL PL_back">
        
      </div>
    </div>
    <div id="group3" class="P_group">
      <div class="PL PL_fore">
         <section>
          <div class="courses_list" id="compulsory_courses">
          <h4>Compulsory Courses</h4>
          <ul type="none">
            <li class="separator">&nbsp</li>
            <li>-<a href="">mth101</a></li>
            <li class="separator">&nbsp</li>
            <li>-<a href="">phy103</a></li>
            <li class="separator">&nbsp</li>
            <li style="border:none !important;"><span style="position: absolute; background-color: red; border-left: 1px groove orange; max-height: 1rem; padding-bottom: 2.7rem;"></span>-<a href="">esc101</a></li>
          </ul>
          </div>
        <div id="optional_courses" class="courses_list">
                <h4>Optional courses Courses</h4>
          <ul type="none">
            <li class="separator">&nbsp</li>
            <li>-<a href="">LOG101</a></li>
            <li class="separator">&nbsp</li>
            <li>-<a href="">art106</a></li>
            <li class="separator">&nbsp</li>
            <li>-<a href="">soc173</a></li>
            <li class="separator">&nbsp</li>
            <li style="border:none !important;"><span style="position: absolute; background-color: red; border-left: 1px groove orange; max-height: 1rem; padding-bottom: 2.7rem;"></span>-<a href="">esc101</a></li>
          </ul>
        </div>
        </section>
      </div>
      <div class="PL PL_base">
        <div class="title" id="main_list">Main List</div>
        <div class="title" id="subscript">Navigation</div>
      </div>
    </div>
    <div id="group4" class="P_group">
      <div class="PL PL_base">
        <div class="title">Base Layer</div>
      </div>
      <div class="PL PL_back">
        <div class="title">Background Layer1</div>
      </div>
      <div class="PL PL_deep">
        <div class="title">Deep Background Layer2</div>
      </div>
    </div>
    <div id="group5" class="P_group">
      <div class="PL PL_fore">
        <div class="title">Foreground Layer2</div>
      </div>
      <div class="PL PL_base">
        <div class="title">MTH101</div>
      </div>
    </div>
    <div id="group6" class="P_group">
      <div class="PL PL_back">
        <div class="title"></div>
      </div>
      <div class="PL PL_base">
        <div class="title">Base Layer3</div>
      </div>
    </div>
    <div id="group7" class="P_group">
      <div class="PL PL_base">
        <div class="title">Base Layer4</div>
      </div>
    </div>
  </div>

  <script>
    var debugInput = document.querySelector("input");
    function updateDebugState() {
        document.body.classList.toggle('debug-on', debugInput.checked);
    }
    debugInput.addEventListener("click", updateDebugState);
    updateDebugState();
  </script>

 
</body>
</html>