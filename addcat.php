<?php
	$dbhost = "localhost:3306";
    // $dbuser = "admin1";
	// $dbpass = "ramesh";
	$conn = mysqli_connect($dbhost, "admin1", "ramesh", "actecomm1");
   
	if(!$conn ) {
      die('Could not connect: ');
	} else {
		// echo 'Connected successfully<br/>';
	}
	$catid=$_POST['newcatid'];
	$catname=$_POST['newcatname'];
	$sql="INSERT INTO CATEGORIES(catid,catname) VALUES ('$catid','$catname')";
	
	$retval = mysqli_query($conn, $sql);
	
	if(!$retval) {
	   echo(mysqli_error($conn));
	   die("Failed to insert record");
	} 
	 mysqli_close($conn);
?>