<!-- Products.php -->
<?php
	if($_GET['catid']==0)
		return;
	$productslst=NULL;
	require './Category.php';
	
	//die("ENtered products.php");
	
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
	$nocolumns=$_GET['nocolumns'];
	$flcolwidth=12/$nocolumns;
	$colwidth=floor(12/$nocolumns);
	if($colwidth<=0)
		$colwidth=1;

	$colid=NULL;
	$colclasses=NULL;
//	if($flcolwidth>1.2&&$flcolwidth<1.65)
	{
//		$colclasses="col-sm-1 col-sm-1-5";
	}
//	else
	{
		$colclasses="col-sm-".$colwidth;
	}
	
	$colact1=NULL;
	$widthint=floor(floor($flcolwidth*10)/10);
	$widthdec=ceil(($flcolwidth-$widthint)*10);
	//die("widthdec is :".(ceil(($flcolwidth-$widthint)*10)));
	$colact1=$widthint."".$widthdec;
	
	
	$output=NULL;
	$sql="SELECT * FROM products WHERE catid=".$catid ;
	$sql2="SELECT * FROM categories where catid=".$catid." AND hassubcat='false'";
	$retval2=mysqli_query($conn, $sql2);
	
	$retval = mysqli_query($conn, $sql);
	//die("row count=".mysqli_num_rows($retval2));
	if(mysqli_num_rows($retval2)==0) {
		$rowcount=0;
		mysqli_free_result($retval);
		mysqli_free_result($retval2);
		
		$sql3="SELECT CHILDCATNAME, CHILDCATID FROM catmap where PARENTCATID=".$catid;
		$retval3 = mysqli_query($conn, $sql3);
		//die("row count=".mysqli_num_rows($retval3));
		$output=NULL;
		$output="<div>";
		while($row=mysqli_fetch_array($retval3, MYSQLI_NUM)) {
			$output.="<a href='#' name=$row[0] onclick='showproducts($row[1])'>$row[0]</a></br>";
			
			$rowcount++;
		}
		$output.="</div>";
		//die("row count =".$rowcount);
	   //die("Failed to fetch record");
	   //die($output);
	   mysqli_free_result($retval3);
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
		
		//$output=$output."<div class='col-sm-"."$colwidth'>";
		//$output=$output."<div class='$colclasses'>";
		
		$output=$output."<div  class='".$colclasses." ".$colact1."' >";
		
		//below line chnaged to add image overlay effect
		//$output=$output."<img src='$row[5]' class='img-responsive' width=100 height=100><a href='$row[6]'>$row[1]</a>" ;
		
		$output=$output."<div class='image1div'><a href='$row[6]'><img src='$row[5]' class='image1 img-responsive' width=100 height=100><span class='imagetext'> $row[1]</span></a></div>" ;
	
		$output=$output."</div>";
		if($count ==1)
			{
			}
		$count ++;
		if($count ==($nocolumns+1))
			{
			$output=$output."</div>";
			$count =1;
			}
		}
		$output=$output."</div>";
		//echo $productslst;
		mysqli_free_result($retval);

	}
	
//   mysqli_free_result($retval);
   mysqli_close($conn);
//	$output="<!--".$output;
//	$output=$output."-->";
  // die("reached end of products.php"); 
   echo $output;

?>
	