<?php
include 'db_code\connectDB.php';
session_start();

if (isset($_SESSION['userId'])) {
    $found = false;
    $obj = json_decode($_GET['x'], false);

    $sql = "select * from rate where userIdConnect = " . $_SESSION['userId'] . " and productIdConnect = '$obj->itemId' ";

    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_array($result)) {

        $found = true;
    }

    if ($found == true) {
        $sql1 = "UPDATE rate SET productRate = '$obj->rate' WHERE userIdConnect = " . $_SESSION['userId'] . " AND productIdConnect = '$obj->itemId' ";
        mysqli_query($connect, $sql1);
    } else {

        $sql1 = "INSERT INTO rate (productRate,productIdConnect,userIdConnect)values( '$obj->rate','$obj->itemId'," . $_SESSION['userId'] . ");";
        mysqli_query($connect, $sql1);
    }
} else {
    echo "Login your account!!";
}
