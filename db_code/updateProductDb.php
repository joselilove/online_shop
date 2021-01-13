<?php
include 'connectDB.php';

$productName = mysqli_real_escape_string($connect, $_GET['productName']);
$category = mysqli_real_escape_string($connect, $_GET['category']);
$price = mysqli_real_escape_string($connect, $_GET['price']);
$quantity = mysqli_real_escape_string($connect, $_GET['quantity']);
$image0 = $_GET['image0'];
$image1 = $_GET['image1'];
$image2 = $_GET['image2'];
$image3 = $_GET['image3'];
$release = mysqli_real_escape_string($connect, $_GET['release']);
$brand = mysqli_real_escape_string($connect, $_GET['brand']);
$model = mysqli_real_escape_string($connect, $_GET['model']);
$description =  mysqli_real_escape_string($connect, $_GET['description']);

$id = $_GET['id'];

$result = mysqli_query($connect, "update product set 
        productName = '$productName', 
        category = '$category', 
        price = $price, 
        quantity = $quantity, 
        productImage0 = '$image0', 
        productImage1 = '$image1', 
        productImage2 = '$image2', 
        productImage3 = '$image3', 
        released = '$release', 
        brand = '$brand', 
        model = '$model', 
        productDescription = '$description'
        where productId = $id;
        ");

if ($result) {
    echo "Product Updated!";
} else {
    echo "Update Failed!";
}
