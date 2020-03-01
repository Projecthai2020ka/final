<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/reg_style.css" type="text/css" rel="stylesheet">
	<title>Pragmatic Register</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body >

<div id="wrapper">
	<div id="kick">
		<img src="css/logo.png" height="100% ">	
		<span id="welcome"><h1>WELCOMES YOU</h1></span>
	</div>
	<div id="mq">
		<div><a id="ki"href="index.html">Go back to the Shopping Site</a></div>
	<marquee direction="right"scrollamount="18"><div id="blue"></div><div id="blue"></div><div id="blue"></div></marquee>
	<marquee direction="left" scrollamount="16"><div id="red"></div><div id="red"></div><div id="red"></div></marquee>
	<marquee direction="right" scrollamount="10"><div id="magenta"></div><div id="magenta"></div><div id="magenta"></div></marquee>
	<marquee direction="left" scrollamount="10"><div id="green"></div><div id="green"></div><div id="green"></div></marquee>
	<marquee direction="right" scrollamount="14"><div id="yellow"></div><div id="yellow"></div><div id="yellow"></div></marquee>
	<marquee direction="left" scrollamount="15"><div id="blue"></div><div id="blue"></div><div id="blue"></div></marquee>
	<marquee direction="right" scrollamount="12"><div id="maroon"></div><div id="maroon"></div><div id="maroon"></div></marquee>
	<marquee direction="left" scrollamount="11"><div id="magenta"></div><div id="magenta"></div><div id="magenta"></div></marquee>
	
	<marquee direction="left" scrollamount="18"><div id="red"></div><div id="red"></div><div id="red"></div></marquee>
	<marquee direction="right" scrollamount="10"><div id="green"></div><div id="green"></div><div id="green"></div></marquee>
	<marquee direction="left" scrollamount="13"><div id="yellow"></div><div id="yellow"></div><div id="yellow"></div></marquee>
	<marquee direction="right" scrollamount="18"><div id="blue"></div><div id="blue"></div><div id="blue"></div></marquee>
	<marquee direction="right" scrollamount="14"><div id="maroon"></div><div id="maroon"></div><div id="maroon"></div></marquee>
	<marquee direction="left" scrollamount="17"><div id="red"></div><div id="red"></div><div id="red"></div></marquee>
	<marquee direction="right" scrollamount="12"><div id="magenta"></div><div id="magenta"></div><div id="magenta"></div></marquee>
	<marquee direction="left" scrollamount="12"><div id="green"></div><div id="green"></div><div id="green"></div></marquee>
	<marquee direction="right" scrollamount="14"><div id="yellow"></div><div id="yellow"></div><div id="yellow"></div></marquee>
	<marquee direction="left" scrollamount="19"><div id="blue"></div><div id="blue"></div><div id="blue"></div></marquee>
	<marquee direction="right" scrollamount="11"><div id="maroon"></div><div id="maroon"></div><div id="maroon"></div></marquee>
	

	<marquee direction="left" scrollamount="18"><div id="red"></div><div id="red"></div><div id="red"></div></marquee>
	<marquee direction="right" scrollamount="10"><div id="green"></div><div id="green"></div><div id="green"></div></marquee>
	<marquee direction="left" scrollamount="13"><div id="yellow"></div><div id="yellow"></div><div id="yellow"></div></marquee>
	<marquee direction="right" scrollamount="18"><div id="blue"></div><div id="blue"></div><div id="blue"></div></marquee>
	<marquee direction="right" scrollamount="14"><div id="maroon"></div><div id="maroon"></div><div id="maroon"></div></marquee>
	<div  id="box">
		<p id="log" align="center">Have an account?<a href="login.php"> Log In</a></p>
		<div id="d1"></div>
		<p id="sign">Sign Up</p>
		<form name="myjs" action="regis.php" method="POST">
			<input class="in" type="text" placeholder="User Name"name="username" ><br>
			<input class="in" type="email" placeholder="E-mail" name="email"><br>
			<input class="in" type="email" placeholder="Re-enter e-mail" name="remail"><br>
			<input class="in" type="password" placeholder="Password" name="password"><br>
			<input class="in" type="password" placeholder="Re-enter Password"name="repass"><br>
			<button id="button" type="submit" onclick="return jsfunc()" >Create account</button>
			<p id="p" >By signing up you agree to our terms & conditions.</p>
		</form>
	</div>
	</div>	




	<div id="last">
		<div id="end">
			<a href="about.html">About   </a>
			<a id="a1" href="terms.html">Terms  </a>
			<a id="a1" href="contact.html">Contact Us</a>
			<div id="copy"><b>Designed by Pragmatic Bond</b></div>
		</div>
			
	</div>
</div>		
		<script type="text/javascript">	
			function jsfunc()
			{
				var name=document.myjs.username.value;
				var mail=document.myjs.email.value;
				var remail=document.myjs.remail.value;
				var pass=document.myjs.password.value;
				var repass=document.myjs.repass.value;
				if(pass.length<10){
					alert("Give strong password");return false;}
				else if(pass!=repass){
					alert("Password mismatch");return false;}
				else if(mail!=remail){
					alert("Email mismatch");return false;}
				else if(name=="" || mail==""||remail==""||pass==""){
					alert("Something missing");return false;}
				else
				{
					return true;
				}
			}
		</script>

</body>
</html>



<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
   $username=$_POST["username"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   
   $con = mysqli_connect("localhost","root","","AKA");
   //checking
   if(!$con) //if false, then show error msg. else we r good to go
   {
          die("connection failed".mysqli_connect_error());
   }

   $sql="select * from Registered_Users where email='$email'";
   $result=mysqli_query($con,$sql);

   if(mysqli_num_rows($result) > 0)
    {
		   echo '<script>alert("The account already exists !! Please Login")</script>';
		   echo "<script>location.href='login.php'</script>";
    }
    else
    {
        $sql="insert into Registered_Users values('$email','$username',$password)";
        if(mysqli_query($con,$sql))
        {
			echo '<script>alert("You are Registered")</script>';
			echo "<script>location.href='login.php'</script>";
        }
    }
    
	mysqli_close($con);
}

?>

