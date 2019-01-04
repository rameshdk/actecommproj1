<!-- Login.php -->
<?php
   // echo phpinfo();
   session_start();
   $dbhost = "localhost:3306";
   $dbuser = "admin1";
   $dbpass = "ramesh";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, "actecomm1");
   
   if(!$conn ) {
      die('Could not connect: ');
   } else {
		echo 'Connected successfully<br/>';
   }
   
   // read username and password from html form
   $uname=$_POST['uname'];
   $pass=$_POST['pass'];
   
   $sql="SELECT * FROM users WHERE username='".$uname."' AND pass='".$pass."'";
   
   $retval = mysqli_query($conn, $sql);
   if(!$retval) {
	   die("Failed to fetch record");
   } else {
		echo "Login Successful";
		// store the user in session object
		$_SESSION['user'] = $uname;
	
		// connect to CategoryController
		// header("Location:./CategoryController.php");
		header("Location:./Categories.php");
   }
   mysqli_free_result($retval);
   mysqli_close($conn);
?>
