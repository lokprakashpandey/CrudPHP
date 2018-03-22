<?php session_start(); ?>

<?php
if(isset($_POST['submitted'])) {
$email=$_POST['email'];
$password=md5($_POST['password']);

$connection = mysqli_connect("localhost", "root", "", "user");

	if(mysqli_connect_errno()) {
		print "connection error";
		exit(1);
	}

$result = mysqli_query($connection, "SELECT * FROM user_table
 WHERE email='$email' AND password='$password'");

	if(mysqli_num_rows($result)) {
		$_SESSION['email'] = $email;
		header("Location: profile.php");
		exit(0);
	}
	else
		echo "<p><b>Incorrect username/password.</b></p>";
}
?>

<h1>Sign In here!!!</h1>
<form method="POST" action="index.php"> 
	E-mail:<input type="email" name="email">
	Password:<input type="password" name="password">
	<input type="submit" value="Sign In" name="submitted">
</form>
	
<br/><br/>

<h1>Register here!!!</h1>
<form method="POST" action="register.php" enctype="multipart/form-data">
Title:	<input type="radio" name="title" value="Mr." checked>Mr.
		<input type="radio" name="title" value="Mrs.">Mrs.
		<input type="radio" name="title" value="Miss">Miss
		<br><br>
First Name:<input type="text" name="fname">
Middle Name:<input type="text" name="mname">
Last Name:<input type="text" name="lname">
		<br><br>
Country:<select name="country">
		<option value="Nepal">Nepal</option>
		<option value="India">India</option>
		<option value="Australia">Australia</option>
		<option value="USA">USA</option>
		<option value="Canada" selected>Canada</option>
		</select>
		<br><br>
Gender:<input type="radio" name="gender" value='M'>Male
	   <input type="radio" name="gender" value='F'>Female
		<br><br>
E-mail:<input type="email" name="email">
		<br><br>
Password:<input type="password" name="pwd">
		<br><br>
Photo:
		<input type="file" name="fileupload">
		<br/><br/>
<input type="reset" value="Reset">
<input type="submit" value="Sign Up" name="registersubmit">
</form>