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
   
   $sql="SELECT ROLE FROM users WHERE username='".$uname."' AND pass='".$pass."'";
   
   $retval = mysqli_query($conn, $sql);
   if(!$retval) {
	   die("Failed to fetch record");
   } else {
		echo "Login Successful";
		// store the user in session object
		$_SESSION['user'] = $uname;
		$row=mysqli_fetch_array($retval,MYSQLI_NUM);
		// connect to CategoryController
		// header("Location:./CategoryController.php");
		if($row[0]=="normal")
			header("Location:./index.php");
		else
			header("Location:./admin.html");
   }
   mysqli_free_result($retval);
   mysqli_close($conn);
?>
