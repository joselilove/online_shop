<?php
SESSION_START();
include 'connectDB.php';
$category = $_GET['categoryName'];
$output = '';
$double = '"';
$query = 'SELECT * FROM product WHERE category = "' . $category . '"';
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result)) {
    $temp = '"' . $row['brand'] . '"';
    $rs = "<input type='checkbox' name='brand[]' value='OR brand = " . $temp . "' onclick='showProductCategory(getCategory())'> " . $row['brand'] . " <br>";
    $output = $output . ' ' . $rs;
}
echo $output;
