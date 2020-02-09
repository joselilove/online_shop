<?php
include 'connectDB.php';
$output = "";
$id = $_GET['id'];
$sql = 'DELETE FROM product WHERE productId = '.$id;
$result = mysqli_query($connect, $sql);
echo "Successfully Deleted";
?>