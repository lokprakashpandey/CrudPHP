<?php

	$connection = mysqli_connect("localhost", "root", "", "user") or die ;

	if(mysqli_connect_errno($connection)) {
				echo "connection error";
				exit();
		}

	$e = $_GET['email'];
	$result = mysqli_query($connection, "select * from user_table where email='$e'");
	$row = mysqli_fetch_array($result);

?>

	<form method="POST" action="userupdate.php">
			Title:	
			<input type="radio" name="title" value="Mr." 
			<?php echo ($row['title']=='Mr.')?'checked':'' ?>
			>Mr.
			<input type="radio" name="title" value="Mrs."
			<?php echo ($row['title']=='Mrs.')?'checked':'' ?>
			>Mrs.
			<input type="radio" name="title" value="Miss"
			<?php echo ($row['title']=='Miss')?'checked':'' ?>
			>Miss
			
			<br><br>
			First Name:<input type="text" name="fname" value="<?php echo $row['fname']; ?>">
			Middle Name:<input type="text" name="mname" value="<?php echo $row['mname']; ?>">
			Last Name:<input type="text" name="lname" value="<?php echo $row['lname']; ?>">
				<br><br>
			Country:<select>
					<option>Nepal</option>
					<option>India</option>
					<option>Australia</option>
					<option>USA</option>
					<option>Canada</option>
					</select>
				<br><br>
			Gender:
			<input type="radio" name="gender" value='M'
			<?php echo ($row['gender']=='M')?'checked':'' ?>
			>Male
			<input type="radio" name="gender" value='F'
			<?php echo ($row['gender']=='F')?'checked':'' ?>
			>Female
			
			<br><br>
			E-mail:<input type="text" name="email" value="<?php echo $row['email']; ?>">
				<br><br>
			Password:<input type="password" name="pwd" value="<?php echo $row['password']; ?>">
				<br><br>
		<input type="submit" value="update" name="update">
		</form>