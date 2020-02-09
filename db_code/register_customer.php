<?php
 $username = $_GET['username'];
 $password = $_GET['password']; 
 $birthday = $_GET['birthday'];
 $firstname = $_GET['firstname'];
 $lastname = $_GET['lastname'];
 $address = $_GET['address'];
 $phone = $_GET['phone'];

include 'connectDB.php';

$query = "INSERT INTO costumer (username, password, birthday, firstname, lastname, address, phone)
 			VALUES
 		('$username', '$password', '$birthday', '$firstname', '$lastname', '$address', $phone)";
 		$result = mysqli_query($connect, $query);
 		if ($result) {
 			echo ("Successfully Register");
 		}
 		else{
 			echo ($result);
 		}
?>