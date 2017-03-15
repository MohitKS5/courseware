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
   <link href="css/forms.css" type="text/css" rel="stylesheet" media="screen,projection">
   <link href="css/responsive.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body class="black">

<div class="fa fa-bars topleft dissolve" onclick="openNav()" id="mobile1"></div>

  
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
<span id="errmsg" style="display: block; font-size: 3rem; color: cyan; font-weight: bold; position: absolute; margin:130rem 0 0 30%; ">
 <?php 
  if(isset($_GET['err']))
  {
    switch($_GET['err'])
    {
      case "xuser":
      echo "<span>It seems that the username has already been taken. Please try another.</span>";
      break;
      case "xpass":
      echo "<span>It seems that the password doesnt fulfil the required condtions. Please try another</span>";
      break;
      case "xemail":
      echo "<span>It seems that the email is either invalid or already taken. Please try another.</span>";
      break;
      case "restricted":
      echo "<span>You have to login before you could continue</span>";
      break;
      case "userpass":
      echo "<span>Username or password wrong!</span>";
      break;
      default:
      echo ":-D";
    }
  }

  ?>
</span>
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
   <input type="text" class="user INLINE" placeholder="Username" name="username" id="usrnm" />
   <span class="fa fa-key INLINE pad2"></span>
   <input type="password" class="pass INLINE" placeholder="password" name="password"/>
 </form>
    </div>

    <div id="tab-Signup" class="tab-content">
      
<form action="signup.php" method="post">  
  
  <h2><span class="fa fa-users lime-text"></span> Sign Up</h2>
  <span class="fa fa-user INLINE"></span> 
  <input class="INLINE" type="text" name="name" placeholder="Your name"><br>
  
  <span class="fa fa-university INLINE"></span>
  <select  name="institute" class="INLINE" id="institute_name">
  <option>hello</option>
  <option>buffalo</option>
    <!--?php 
    $conn = new mysqli("127.0.0.1","root","","codefundo");
    $sql = "SELECT instituteid, name FROM institutes";
    $res = $conn->query($sql);
    for($i=0;$i<$res->num_rows;$i++)
    {
      $row = $res->fetch_array(MYSQL_ASSOC);

      echo "<option value=".$row['instituteid'].">".$row['name']."</option>";
    } 
    $conn->close();
    ?-->
  </select><br>
  <span class="fa fa-edit INLINE"></span>
  <input class="INLINE" type="text" name="username" placeholder="Your preferred username" onkeyup="checkUsername(this.value);"> <span id="usernameDetails"></span><br>
  <span class="fa fa-key INLINE"></span>
  <input class="INLINE" type="password" name="password" placeholder="Your password"><br>
  <span class="fa fa-key INLINE"></span>
  <input class="INLINE" type="password" name="passwordAgain" placeholder="Your password again"><br>
  <span class="fa fa-envelope INLINE"></span>
  <input type="text" class="INLINE" name="email" placeholder="Your email address" onkeyup="validateEmail(this.value);"> <span id="emailDetails"></span><br>
  <span class="INLINE" style="font-size: 1.5rem !important">DOB:</span>
  <input class="INLINE" type="date" name="dob" id="dob">
  <button class="submit" id="register" type="submit" name="I'm in!" disabled="disabled">I'm in!</button>
  </form>


<script>
  var trueResponse = "This username is available";
  var falseResponse = "Sorry! This username is not available";
  var uname = false;
  var m = false;
  function checkUsername(username)
  {
    if(username==="")
    {
      $("#usernameDetails").text("");
      return;
    }
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if(this.readyState ===4 && this.status===200) {
        console.log(this.responseText);
        if(this.responseText === "true")
        {
          $("#usernameDetails").text(trueResponse);
          uname=true;
        }
        else
        {
          $("#usernameDetails").text(falseResponse);
          uname=false;
        }
      }
    };
    xmlhttp.open("GET","enq.php?username="+username+"&a=true");
    xmlhttp.send();
    check();
  }
  function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(re.test(email) || email === "") {
        $("#emailDetails").text("");
        m=true;
      } else {
        $("#emailDetails").text("Please enter a valid email address");
        m=false;
      }
      check();
  }

  function check() {
    if(m && uname)
      $("#register").removeAttr("disabled")
    else
      $("#register").attr("disabled","disabled");
  }
</script>

    </div>
  </section>
  <hr class="stylish">
  
  

  <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  
 

</body>


</html>
