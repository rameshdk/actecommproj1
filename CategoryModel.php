<!-- CategoryModel.php -->
<?php
	require 'Category.php';
	/*
	connect to DB
	select * from categories
	store each category record in one Category class object
	store all the objects in array $catList
	store the array in session using name "categories
	*/
   $dbhost = "localhost:3306";
   $dbuser = "ecomm1";
   $dbpass = "ecomm1";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, "ecomm");
   
   if(!$conn ) {
      die('Could not connect: ');
   } else {
		echo 'Connected successfully<br/>';
   }
   
   // create one list to store catList
   $catList=array();
   $idx=0;
   // fetch records from categories table
   $sql="SELECT * FROM categories";
   $retval = mysqli_query($conn, $sql);
   if(!$retval) {
	   die("Failed to fetch record");
   } else {
	   // if records are there
	   while($row=mysqli_fetch_array($retval, MYSQLI_NUM)) {
		// store each record in one Category class object
		$cat=new Category($row[0], $row[1]);
		// store each object into list
		$catList[$idx++]=$cat;
	   }
	   // $_SESSION['categories']=serialize($catList);
	   $_SESSION['categories']=$catList;
	   $_SESSION['records_count']=$idx;
   }
   mysqli_free_result($retval);
   mysqli_close($conn);
?>
