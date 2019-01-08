<!-- Categories.php -->
<?php
	require './Category.php';
	
	$dbhost = "localhost:3306";
    $dbuser = "admin1";
	$dbpass = "ramesh";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, "actecomm1");
   
	if(!$conn ) {
      die('Could not connect: ');
	} else {
		// echo 'Connected successfully<br/>';
	}
	
	$sql="SELECT * FROM categories WHERE hasparentcat='false'";
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
	   die("Failed to fetch record");
	} else {
	   // if records are there
	   while($row=mysqli_fetch_array($retval, MYSQLI_NUM)) {
		  // echo "<a href='./Products.php?catid=".$row[0]."'>".$row[1]."</a><br/> ";
		   echo "<a onclick='showproducts($row[0])' href='#'>".$row[1]."</a><br/> ";
	   }
	}
   mysqli_free_result($retval);
   mysqli_close($conn);
?>
	