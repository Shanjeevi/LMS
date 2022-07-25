<?php
	include 'dbs/dbs_connectivity.php';


	if(isset($_POST['btnsave'])){
		$books = $_POST['BookName'];
		$author = $_POST['Author'];
		$genre = $_POST['Genre'];
		$price = $_POST['Price'];
		
		$sql = "INSERT INTO mst_book (book_name, book_author, genre, book_price) VALUES ('$books', '$author', '$genre', '$price')";
		if($con->query($sql)){
			$_SESSION['success'] = 'Book added successfully';
		}
		else{
			$_SESSION['error'] = $con->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: material-dashboard-master/pages/books.php');

?>