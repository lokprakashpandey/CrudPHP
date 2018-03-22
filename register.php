<?php
if(!isset($_POST['registersubmit'])) {
				header("Location: index.php");
				exit(0);
}
?>
<?php
	$connection = mysqli_connect("localhost", "root", "", "user");

	if(mysqli_connect_errno()) {
			print "connection error";
			exit(1);
	}

	else {
    
	$title=$_POST['title'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=md5($_POST['pwd']);

    $query=mysqli_query($connection, "SELECT * FROM user_table WHERE email='$email'");
          
        if(!mysqli_num_rows($query))
        {

        //for file uploading
		$source_file = $_FILES['fileupload']['name'];  		
		$target_dir = "uploads/";
		$target_file = $target_dir.$source_file;

		move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
	    
        $query = mysqli_query($connection, "INSERT INTO user_table 
        	(title,fname,mname,lname,gender,email,password,filename) VALUES 
        	('$title','$fname','$mname','$lname','$gender','$email',
        		'$password','$source_file')");

        print "Sign Up Succesful. ";
        print 'Proceed to <a href="index.php">Login</a>';
        }
        else {
          print "This email is already being used. Try logging in.";
        }
    }
?>