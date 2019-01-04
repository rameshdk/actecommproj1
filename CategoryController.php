<!-- CategoryController.php -->
<?php
	/*
	check is catList exist in session scope with name 'categories'
if exist 
	send CategoriesView to browser
else
	connect to CategoryModel
	*/
	/*
	if(isset($_SESSION['categories'])) {
		// send CategoriesView.php to browser
		// nothin but redirect
		header("Location:./CategoriesView.php");
	} else {
		// include 
	*/	
		include 'CategoryModel.php';
		header("Location:./CategoriesView.php");
	/* 
	} 
	*/
?>
	