<?php session_start();

?>
<?php

	if(!isset($_SESSION['email']))
			{
				header("Location: index.php");
				exit();
			}
?>

<!DOCTYPE html>
<html>
	<body>
	<?php
	$e = $_SESSION['email'];
	$con = mysqli_connect("localhost","root","","user");
	if (mysqli_connect_errno()) {
		print "Connection refused";
		exit(1);
	}
	else
	{
		$sql = "select * from user_table where email='$e'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$img = "uploads/".$row['filename'];	
	}
	?>
		<h1>Welcome <?php echo $e; ?> to Nepalese Facebook.</h1>
		<img src="<?php echo $img; ?>">
		</img>	
		<p><a href="logout.php">Logout</a></p>
		You can edit/delete users via <a href="userlist.php">this link</a>.
	</body>
</html>
