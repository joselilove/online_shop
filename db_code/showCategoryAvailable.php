<?php
include 'connectDB.php';
$categoryName = $_GET['categoryName'];
if ($categoryName == "All") {
    $query = 'SELECT count(*) as total FROM product';
} else {
    $query = 'SELECT count(*) as total FROM product WHERE category ="' . $categoryName . '"';
}
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);
echo '<h3> ' . $categoryName . ' <small class="pull-right"> ' . $row['total'] . ' Products are available </small></h3>
         <input type="hidden" name="hiddenCategory" value="' . $categoryName . '">';
