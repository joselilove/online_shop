<?php
$username = $_GET['username'];
$password = $_GET['password'];

include 'connectDB.php';
$query = "SELECT * FROM costumer WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);
if ($row != 0) {
    SESSION_START();
    $_SESSION['username'] = $row['username'];
    $_SESSION['userId'] = $row['costumerID'];
    echo "WELCOME $username";
} else {
    echo "Invalid Username or Password!";
}
