<?php
	$connection = mysqli_connect("localhost", "root", "", "user");
	if(mysqli_connect_errno($connection)) {
				echo "connection error";
				exit(1);
		}
	else {
		$e = $_GET['email'];
		$sql = "delete from user_table where email = '$e'";
		if(!mysqli_query($connection,$sql)) {
			echo "User not deleted";
		}
		else {
			header("Location: userlist.php");
		}
	}
?>