<?php
SESSION_START();
include 'connectDB.php';
    if (!isset($_SESSION['userId'])) {
        echo 'Please Login your Account!!';
    }
    else{
$productId  = $_GET['productId'];
$comment= mysqli_real_escape_string($connect, $_GET['comment']);
$query          = 'INSERT INTO comment(costumerIdConnect,productIdConnect, commentDescription) VALUES 
                                        ('.$_SESSION['userId'].','.$productId.',"'.$comment.'")';
$result         = mysqli_query($connect, $query);
    }

?>