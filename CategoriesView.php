<!-- CategoriesView.php -->
<?php
	require './Category.php';
	
	$catList=unserialize("", (array)$_SESSION['categories']);
	// $catList=(array)$_SESSION['categories'];
	echo gettype($catList)."<br/>";
	echo $catList."<br/>";
	$cat=$catList[0];
	echo gettype($cat)."<br/>";
	echo (array)$cat."<br/>";
	$c=(array)$cat;
	echo $c[0]; 
	// echo $cat->getCatid()." ".$cat->getCatname();
	// echo $cat->getCatname();
	
	echo $_SESSION['records_count'];
?>
