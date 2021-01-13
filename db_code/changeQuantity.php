<?php
SESSION_START();
include 'connectDB.php';

$data       = $_GET['data'];
$operator   = $_GET['operator'];
$productId  = $_GET['productId'];
$quantity   = $_GET['quantity'];
$toBeTotalQuantity = 0;

$checkQuantity = 'SELECT * FROM product, cart WHERE productIdConnect = productId AND productId = ' . $productId . ' AND userIdConnect = ' . $_SESSION['userId'];
$checkResult = mysqli_query($connect, $checkQuantity);
$row = mysqli_fetch_array($checkResult);
if ($operator == "-") {
    $toBeTotalQuantity  = $row['orderQuantity'] - $data;
} else {
    $toBeTotalQuantity  = $row['orderQuantity'] + $data;
}

if ($row['quantity'] >= $toBeTotalQuantity && $toBeTotalQuantity >= 1) {

    if ($operator == "-") {
        $queryUpdate = "UPDATE cart SET orderQuantity = orderQuantity - " . $data . " WHERE productIdConnect = " . $productId . " AND userIdConnect = " . $_SESSION['userId'] . "";
    } else {
        $queryUpdate = "UPDATE cart SET orderQuantity = orderQuantity + " . $data . " WHERE productIdConnect = " . $productId . " AND userIdConnect = " . $_SESSION['userId'] . "";
    }
    mysqli_query($connect, $queryUpdate);
    echo "valid";
} else {
    echo "This Item contains only " . $row['quantity'] . " Stocks!!";
}
