<?php
if(isset($_POST['update'])) {
	$title=$_POST['title'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=md5($_POST['pwd']);

	$connection = mysqli_connect("localhost", "root", "", "user");
	$sql = "UPDATE user_table SET title='$title',fname='$fname',mname='$mname',lname='$lname', 
			gender='$gender', password='$password' where email='$email'";

	if(!mysqli_query($connection, $sql)) {
		print "Record not updated";
	}
	else
		header("Location: userlist.php");
}
?>