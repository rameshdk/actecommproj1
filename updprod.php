<?php
	$dbhost = "localhost:3306";
    $dbuser = "admin1";
	$dbpass = "ramesh";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, "actecomm1");
   
	if(!$conn ) {
      die('Could not connect: ');
	} else {
		// echo 'Connected successfully<br/>';
	}
	$pid=$_POST['pid'];
	$pname=$_POST['pname'];
	$catid=$_POST['catid'];
	
	$proddescr1=$_POST['proddescr'];
	$imgpath=$_POST['imgpath'];
	$produrl=$_POST['produrl'];
	//$imagepath=substr($imgpath, strpos($imgpath,'images'), strpos($imgpath, '@') - strlen($imgpath));
	$imagepath="images/"."$imgpath";
	$sql="UPDATE PRODUCTS SET pname='$pname',catid='$catid',IMGPATH='$imagepath',pdescr='$proddescr1' URLDETAILS='$produrl' WHERE pid='$pid'";
	
	$retval = mysqli_query($conn, $sql);
	
	if(!$retval) {
		echo($imgpath);echo("<\br>");
		echo($imagepath);echo("<\br>");
		echo($proddescr1);echo("<\br>");
	   echo(mysqli_error($conn));
	   die("Failed to insert record");
	} 
	 mysqli_close($conn);
?>