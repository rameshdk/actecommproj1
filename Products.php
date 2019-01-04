<!-- Products.php -->
<?php
	$productslst=NULL;
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
	
	$catid=$_GET['catid'];
	$count=1;
	$nocolumns=2;
	$colwidth=floor(12/$nocolumns);
	$output=NULL;
	$sql="SELECT * FROM products WHERE catid=".$catid;
	
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
	   die("Failed to fetch record");
	} else {
	   // if records are there
	   $output=$output."<div class='container'>";
	   while($row=mysqli_fetch_array($retval, MYSQLI_NUM)) {
		//$productslst.=$row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]."<br/>";
		//echo $productslst;
	   //echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]."<br/>";
		if($count == 1)
		{
			$output=$output."<div class='row'>";
		}
			
		//echo "<img src='$row[5]'> <a href='$row[6]'>$row[1]</a></img>" ;
		//echo "<div class='container1'><img src='$row[5]'><div class='overlay'> <a href='$row[6]'>$row[1]</a></div></div>" ;
		//echo "<div class='container1'><img src='$row[5]'><div class='overlay'> <a href='$row[6]'>$row[1]</a></div></div>" ;
		//echo "<img src='$row[5]'><div class='overlay'> <a href='$row[6]'>$row[1]</a></div>" ;
		$output=$output."<div class='col-sm-"."$colwidth'>";
		$output=$output."<img src='$row[5]' class='img-thumbnail'><a href='$row[6]'>$row[1]</a>" ;
		$output=$output."</div>";
		if($count ==1)
			{
			}
		$count ++;
		if($count ==$nocolumns)
			{
			$output=$output."</div>";
			$count =1;
			}
		}
		$output=$output."</div>";
		//echo $productslst;
	}
	
   mysqli_free_result($retval);
   mysqli_close($conn);
//	$output="<!--".$output;
//	$output=$output."-->";
   echo $output;

?>
	