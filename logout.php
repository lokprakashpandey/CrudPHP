<?php session_start();?>

<?php
	if(!isset($_SESSION['email']))
			{
				header("Location: index.php");
				exit();
			}
?>

<?php
session_destroy();
header("Location:index.php");
exit();	
?>
