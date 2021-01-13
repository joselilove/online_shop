<?php
include 'connectDB.php';
$productId    = $_GET['productId'];
$output = '';
$query          = 'SELECT * FROM product WHERE productId = ' . $productId . '';
$result         = mysqli_query($connect, $query);
while ($row     = mysqli_fetch_array($result)) {
    $tableStart = '<table class="table table-bordered">';
    $tbodyStart = '<tbody>';
    $tr1        = '<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>';
    $tr2        = '<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">' . $row['brand'] . '</td></tr>';
    $tr3        = '<tr class="techSpecRow"><td class="techSpecTD1">Model: </td><td class="techSpecTD2">' . $row['model'] . '</td></tr>';
    $tr4        = '<tr class="techSpecRow"><td class="techSpecTD1">Released on: </td><td class="techSpecTD2"> ' . $row['released'] . '</td></tr>';
    $tbodyEnd   = '</tbody>';
    $tableEnd   = '</table>';
    $description = '<h5>Description</h5>';
    $ShowDes    = '<p>' . $row['productDescription'] . '</p>';
    $output = $output . ' ' . $tableStart . ' ' . $tbodyStart . ' ' . $tr1 . ' ' . $tr2 . ' ' . $tr3 . ' ' . $tr4 . ' ' . $tbodyEnd . ' ' . $tableEnd . ' ' . $description . ' ' . $ShowDes;
}
echo $output;
