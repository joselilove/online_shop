<?php
  	include 'connectDB.php';

	$productName = mysqli_real_escape_string($connect, $_GET['productName']);
	$category = mysqli_real_escape_string($connect, $_GET['category']);
	$price = mysqli_real_escape_string($connect, $_GET['price']);
	$quantity = mysqli_real_escape_string($connect, $_GET['quantity']);
	$image0 = $_GET['image0'];
	$image1 = $_GET['image1'];
	$image2 = $_GET['image2'];
	$image3 = mysqli_real_escape_string($connect, $_GET['image3']);
	$release = mysqli_real_escape_string($connect, $_GET['release']);
	$brand = mysqli_real_escape_string($connect, $_GET['brand']);
	$model = mysqli_real_escape_string($connect, $_GET['model']);
	$description = mysqli_real_escape_string($connect, $_GET['description']);

	$query = "INSERT INTO product(productName, category, price, quantity, productImage0, productImage1, productImage2, productImage3, released, brand, model, productDescription) 
			  VALUES
			 ('$productName', '$category', $price, $quantity, '$image0', '$image1', '$image2', '$image3', '$release', '$brand', '$model', '$description')";
	$result = mysqli_query($connect, $query);
	if ($result) {
		echo "Product Added!";
	}
	else{
		echo "Complete the Form blow!!";
	}

?>