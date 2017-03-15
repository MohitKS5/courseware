<!DOCTYPE html>
<html>
<body>

<form action="signup.php" method="post">
	<input type="text" name="name" placeholder="Your name">
	<input type="text" name="username" placeholder="Your preferred username" onkeyup="checkUsername(this.value);"> <span id="usernameDetails"></span>
	<input type="password" name="password" placeholder="Your password">
	<input type="password" name="passwordAgain" placeholder="Your password again">
	<input type="text" name="email" placeholder="Your email address" onkeyup="validateEmail(this.value);"> <span id="emailDetails"></span>
	<select name="institute">
		<?php  //TODO add php for displaying the institute names ?>
	</select>
	<div>Enter your date of birth</div>
	<input type="date" name="dob" id="dob">
	<input type="submit" value="I'm in!" disabled="disabled">
</form>

<script src="js/jquery-2.2.4.min.js"></script>
<script>
	var trueResponse = "This username is available";
	var falseResponse = "Sorry! This username is not available";
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
					$("#usernameDetails").text(trueResponse);
				else
					$("#usernameDetails").text(falseResponse);
			}
		};
		xmlhttp.open("GET","enq.php?username="+username+"&a=true");
		xmlhttp.send();
	}
	function validateEmail(email) {
    	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	if(re.test(email) || email === "")
    		$("#emailDetails").text("");
    	else
    		$("#emailDetails").text("Please enter a valid email address");
	}
</script>
</body>
</html>