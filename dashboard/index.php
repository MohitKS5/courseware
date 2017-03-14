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


<!-- Links to the author of the document -->
<link rel="author" href="humans.txt">

  
  <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:500%7CFredoka+One%7CPompiere%7CSource+Code+Pro" rel="stylesheet">
  <link href="css/materialize.min.css" rel="stylesheet" type="text/css" media="screen,projection">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/responsive.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body class="black">

<div class="fa fa-bars topleft dissolve" onclick="openNav()" id="mobile1"></div>
<script>

</script>

  
  <header class="navbar-fixed dissolve" id="header">
    <nav>
      <div class="nav-wrapper grey darken-3">
        <a href="#intro" class="brand-logo white-text smoothscroll">     Course Ware <i class="fa fa-home" aria-hidden="true"></i></a>
       
        <ul class="right hide-on-med-and-down tabs2">
          <li data-id="tab-signin" class="active"><a href="#logsec">Sign In</a></li>
          <li data-id="tab-Signup"><a href="#logsec">Sign Up</a></li>
          <li data-id="tab-about"><a href="#logsec">About</a></li>
          <li data-id="tab-suport"><a href="#logsec">Support</a></li>
          </ul>
        <div id="mysidenav" class="sidenav1">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebutton">&times;</a>
          <ul class="tabs2">
          <li data-id="tab-signin" class="active"><a class="listed" href="#logsec">Sign In</a></li>
          <li data-id="tab-Signup"><a class="listed" href="#logsec">Sign up</a></li>
          <li data-id="tab-about"><a class="listed" href="#logsec">About</a></li>
          <li data-id="tab-suport"><a class="listed" href="#logsec">Suport</a></li>

          </ul>
        </div>
      
      </div>
    </nav>
  </header>
  <section class="intro fullscreen lime-text text-accent-3" id="intro" >
    <hgroupa>
      <h1 class=" main hover-spin" id="me"> COURSE BUDDY <i class="fa fa-book spin" id="anime"></i></h1>
      <br>
      <h5 class="hvr-shutter-in-vertical sub"> A Handy course management tool</h5>
      <br>
    </hgroup>
    
    <div class="scroll-icon">

             <p class="scroll-text">Scroll | click here</p>
             <a href="#logsec" class="smoothscroll">
              <div class="mouse"></div>
             </a>
            <div class="end-top"></div>

          </div> <!-- /scroll-icon -->

  </section>
 
  <section class="main-sec fullscreen padcenter" id="logsec">
      <div id="tab-signin" class="tab-content">
<!-- forms -->
  <form action="processlogin.php" method="post">
   <h2><span class="fa fa-users lime-text"></span> Login</h2>
   <button class="submit"><span class="fa fa-lock"></span></button>
  
    <span class="fa fa-user INLINE pad"></span>
   <input type="text" class="user INLINE" placeholder="Username" name="username"/>
   <span class="fa fa-key INLINE pad2"></span>
   <input type="password" class="pass INLINE" placeholder="Password" name="password"/>
 </form>
    </div>

    <div id="tab-Signup" class="tab-content">
      <form action="">                                                                            <!-- TODO Link to the sign up processor -->
   <h2><span class="fa fa-users lime-text"></span> Sign Up</h2>
   <button class="submit" id="register"><span class="fa fa-lock"></span></button>
  
    <span class="fa fa-university INLINE pad2"></span>
   <input type="Institute name" class="pass INLINE" placeholder="Institute name"/>
    <span class="fa fa-user INLINE pad"></span>
   <input type="text" class="user INLINE" placeholder="ursername"/>
   <span class="fa fa-key INLINE pad2"></span>
   <input type="password" class="pass INLINE" placeholder="password"/>
    </form>
    </div>
  </section>
  <hr class="stylish">
  
  

  <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>


</html>