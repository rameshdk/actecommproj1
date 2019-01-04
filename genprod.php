<?php
echo "<html><head></head><body>"
	$productslst=NULL;

	
	$dbhost = "localhost:3306";
    $dbuser = "admin1";
	$dbpass = "ramesh";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, "actecomm1");
   
	if(!$conn ) {
      die('Could not connect: ');
	} else {
		// echo 'Connected successfully<br/>';
	}
	
	$pid=$_GET['pid'];
	$sql="SELECT * FROM products WHERE pid=".$pid;
	
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
	   die("Failed to fetch record");
	} else {
	   // if records are there
	   while($row=mysqli_fetch_array($retval, MYSQLI_NUM)) {
	   $urldetails=$row[6];
	   if($urldetails=="#")
			{
			echo "<img src='$row[5]'><div><p>'$row[3]'</p></div>";
			}
		}
	}
echo"</body></html>"

?>