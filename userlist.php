<?php
	$connection = mysqli_connect("localhost", "root", "", "user");

	if(mysqli_connect_errno($connection)) {
				echo "connection error";
				exit(1);
		}

	else {
			$result = mysqli_query($connection, "SELECT * FROM user_table");

		?>

		<table border="1">
			<tr>
				<th>Title</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Password</th>
				<th>Action</th>
			</tr>

		<?php
			while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['fname']."</td>";
			echo "<td>".$row['mname']."</td>";
			echo "<td>".$row['lname']."</td>";
			echo "<td>".$row['gender']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['password']."</td>";
			echo "<td>"."<a href='useredit.php?email=".$row['email']."'>Edit</a>/";
			echo "<a href='userdelete.php?email=".$row['email']."'>Delete</a></td>";
			echo "</tr>";
		}
	?>
</table>
<?php } ?>