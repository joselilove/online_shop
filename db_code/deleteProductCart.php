<?php
include 'connectDB.php';
$productId = $_GET['productId'];
$userId = $_GET['userId'];

$query = "DELETE FROM cart WHERE productIdConnect = " . $productId . " AND userIdConnect = " . $userId . "";
$result = mysqli_query($connect, $query);
echo "Successfully Deleted";
