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
	
	//$catid=$_POST['catid'];
	$count=1;
	$nocolumns=8;
	$colwidth=floor(12/$nocolumns);
	if($colwidth<0)
	{
//		die("column width is 1");
		$colwidth=1;
	}
	$output=NULL;
	$searchterm=$_GET['SearchTerm'];
	//die($searchterm);
	$searchterm1=$searchterm;
	$index=0;
	$matchedproducts=array();
	//$matchedproducts[0]=1;
		
	$sql2="SELECT * FROM PRODUCTS";
	$retval2=mysqli_query($conn, $sql2);
	if(!$retval2) {
		   echo(mysqli_error($conn));
		   die("Failed to fetch rows");
	}
	
	while($row2=mysqli_fetch_array($retval2, MYSQLI_NUM)) 
	{
		$filcont=@file_get_contents($row2[6]);
		if(!($searchterm==""))
		if(stripos($filcont,$searchterm)!=false)
		{
//			die("file contains:".$filcont." searchterm:".$searchterm);
			$matchedproducts[$index++]=$row2[0];
//			$sql4="SELECT * FROM PRODUCTS WHERE pid=".$row2[0];
//			$retval4=mysqli_query($conn, $sql2);
//			$row5=mysqli_fetch_array($retval, MYSQLI_NUM);
		}
		
	}
	
	//die("(" . implode(',', $matchedproducts) . ")");
	if(!empty($matchedproducts))
	$sql="SELECT * FROM products WHERE pdescr LIKE "."'%$searchterm%'" ." OR pname LIKE "."'%$searchterm%'"." OR pid IN (" . implode(',', $matchedproducts) . ")" ;
	 else
			$sql="SELECT * FROM products WHERE pdescr LIKE "."'%$searchterm%'" ." OR pname LIKE "."'%$searchterm%'";

		 //die($sql);
	$retval = mysqli_query($conn, $sql);
	if(!$retval) {
		   echo(mysqli_error($conn));
		   echo("searchterm=".$searchterm);
		   echo(" ");
		   echo($sql);
		   die("Failed to fetch rows");
	}
	
	//die("row count=".mysqli_num_rows($retval2));
	//die("no rows found:".mysqli_num_rows($retval));
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
		
		$output=$output."<div width=floor(700/$nocolumns) class='col-sm-"."$colwidth' >";
		//$output=$output."<div width=floor(700/$nocolumns) class='col' >";
		
		//$output=$output."<div width=floor(450/$nocolumns) >";
		
		
		
		//$output=$output."<a href='$row[6]'><img src='$row[5]' class='image1 img-responsive' width=100 height=100><a href='$row[6]'><p //class='imagetext'> $row[1]</p></a></a>" ;
		//die("colwidth:".$colwidth);
		$imgwidth=floor(450/$nocolumns);
		//die("image width is $imgwidth");
		$output=$output."<div class='image1div'><a href='$row[6]'><img src='$row[5]' class='image1  imageclass$colwidth' width=$imgwidth ></br><span class='imagetext'> $row[1]</span></a></div>" ;
		
		//die("style='width:$imgwidth px;height:$imgwidth px;");
		
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
	//	die("row count is ".$count);
		$output=$output."</div>";
		//echo $productslst;
		mysqli_free_result($retval);

	
//   mysqli_free_result($retval);
   mysqli_close($conn);
//	$output="<!--".$output;
//	$output=$output."-->";
   
   
   echo $output;

?>
	