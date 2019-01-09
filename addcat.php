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
	$catid=$_POST['newcatid'];
	$catname=$_POST['newcatname'];
	//if(!empty($_POST['subcatid']))
	//	$HasSubCat='true';
	//else
	//	$HasSubCat='false';
	if(!empty($_POST['parcatid']))
		$HasParCat='true';
	else
		$HasParCat='false';
	
	//$childcatname=$_POST['childcatname'];
	$parcatname=$_POST['parcatname'];
	
	//$childcatid=$_POST['childcatid'];
	$parcatid=$_POST['parcatid'];
	
	$HasSubCat="false";
	
	$sql="INSERT INTO CATEGORIES(catid,catname,hassubcat,hasparentcat) VALUES ($catid,'$catname','$HasSubCat','$HasParCat')";
	
	
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
		   echo(mysqli_error($conn));
		   die("Failed to insert record");
	}
	
	
	if(!empty($parcatid))
	{
		$sql="SELECT MAX(rowindex)  AS 'maxrowindex' FROM catmap";
	
		$queryres=mysqli_query($conn, $sql);
		while($row=mysqli_fetch_array($queryres,MYSQLI_ASSOC))
		$rowindexmax=$row["maxrowindex"];
		//$rowval=mysqli_fetch_array($queryres, MYSQLI_NUM);
		//$rowval1=$rowval;
		$rowindexmax++;
		//die("maxrow is:".$rowindexmax);
		$sql="INSERT INTO CATMAP values ($parcatid,$catid,'$parcatname','$catname',".$rowindexmax.")";
		//die($sql);
		$retval = mysqli_query($conn, $sql);
	
	
		if(!$retval) {
		   echo(mysqli_error($conn));
		   die("Failed to insert record");
		}
		$sql="Update categories Set hasparentcat='true' where catid=".$catid;
		
		$retval = mysqli_query($conn, $sql);
	
	
		if(!$retval) {
		   echo(mysqli_error($conn));
		   die("Failed to update record");
		}
	
	}	
	
	 mysqli_close($conn);
?>