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
	$nocolumns=$_GET['nocolumns'];
	$flcolwidth=12/$nocolumns;
	
	$colwidth=floor($flcolwidth);
	if($colwidth<0)
	{
//		die("column width is 1");
		$colwidth=1;
	}
	$colname=NULL;
	$colid=NULL;
	$colact=NULL;
	
	$colact1=NULL;
	$widthint=floor(floor($flcolwidth*10)/10);
	$widthdec=ceil(($flcolwidth-$widthint)*10);
	//die("widthdec is :".(ceil(($flcolwidth-$widthint)*10)));
	$colact1=$widthint."".$widthdec;
	
/*	if($flcolwidth>1.2&&$flcolwidth<1.65)
	{
		$colname="col-sm-1";
		$colid="icol-sm-1-5";
		$colact="col-sm-1-5";
	}
	else
	{
	*/
		$colname="col-sm-$colwidth";
/*	}*/
	//die("at 1:".$colact1);
	//die($colsuffix);
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
	
	// if records are there
	   $output=$output."<div class='container'>";
	   $divind=0;
	   while($row=mysqli_fetch_array($retval, MYSQLI_NUM)) {
		//$productslst.=$row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]."<br/>";
		//echo $productslst;
	   //echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]."<br/>";
		
		if($count == 1)
		{
			$output=$output."<div class='row'>";
		}
			
		
		$test=(string)"".$colname."";
		//die($test);
		
		//$output=$output."<div class='thumbnail'>";
		
		$output=$output."<div  class='".$colname." ".$colact1."' >";
		//die("at 2:".$colact1);
		
		
		$imgwidth=floor(450/$nocolumns);
		//die("image width is $imgwidth");
		/*$output=$output."<div class='image1div'><a href='$row[6]'><img src='$row[5]' class='imageclass$nocolumns image1 img-responsive'  ></br><span class='imagetext'> $row[1]</span></a></div>" ;*/

		$output=$output."<div class='image1div'><a href='$row[6]'><img src='$row[5]' class='imageclass$nocolumns image1 img-responsive'  ></br><div  style='float:none'><span class='imagetext' > $row[1]</span></div></a></div>" ;

		
		//die("style='width:$imgwidth px;height:$imgwidth px;");
		
		$output=$output."</div>";//col end here
		//$output=$output."</div>";//thubnail ends here
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
//on line 81 div is closed here	
		$output=$output."</div>";
		//echo $productslst;
		mysqli_free_result($retval);

	
//   mysqli_free_result($retval);
   mysqli_close($conn);
//	$output="<!--".$output;
//	$output=$output."-->";
   
   
   echo $output;

?>
	