<?php
SESSION_START();
include 'connectDB.php';
$address = $_GET['address'];
$prodId = $_GET['prodId'];
if ($address != "") {

    $queryCheck = 'SELECT * FROM cart where userIdConnect = ' . $_SESSION['userId'];
    $result = mysqli_query($connect, $queryCheck);
    while ($row = mysqli_fetch_array($result)) {
        $queryUpdateProduct = 'UPDATE product SET quantity = quantity - ' . $row['orderQuantity'] . ' where productId = ' . $row['productIdConnect'];
        mysqli_query($connect, $queryUpdateProduct);
    }

    $query = "DELETE FROM cart where userIdConnect = " . $_SESSION['userId'];
    mysqli_query($connect, $query);
} else {
    echo "Pls Enter you address!!";
}
echo "Thank You Come Again";
