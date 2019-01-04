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
	$emptyurl=false;
	$fullurl=NULL;
	if($produrl==NULL)
		{
		$emptyurl=true;
		}
	//$imagepath=substr($imgpath, strpos($imgpath,'images'), strpos($imgpath, '@') - strlen($imgpath));
	$imagepath="images/"."$imgpath";
	if($emptyurl)
		{
		$fname="produrls/$pname";
		$ext="html";
		$fullurl=$fname.".".$ext;
		}
	$sql="INSERT INTO PRODUCTS(pid,pname,catid,IMGPATH,pdescr,URLDETAILS) VALUES ('$pid','$pname','$catid','$imagepath','$proddescr1','$fullurl')";
	
	$retval = mysqli_query($conn, $sql);
	$modimagepath="../".$imagepath;
	if($emptyurl)
		{
		$content="<img src='$modimagepath'><div><p>$proddescr1</p></div>";
		$fpurl=fopen($fullurl,'w');
		fwrite($fpurl,$content);
		fclose($fpurl);
		}
	if(!$retval) {
		echo($imgpath);echo("<\br>");
		echo($imagepath);echo("<\br>");
		echo($proddescr1);echo("<\br>");
	   echo(mysqli_error($conn));
	   die("Failed to insert record");
	} 
	 mysqli_close($conn);
?>