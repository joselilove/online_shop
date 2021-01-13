<?php
include 'connectDB.php';
$output = '';
$id = '';
$trStart = '';
$img =    '';
$productName = '';
$tdStart = 	  '';
$divStart =	'';
$input = '';
$button = '';
$divEnd = '';
$tdEnd = '';
$trEnd = '';

if (isset($_GET['search'])) {
    if ($_GET['search'] == "") {
        echo "Search Now!!";
    } else {
        $search = $_GET['search'];
        $sql = "SELECT * FROM product where productName LIKE '" . $search . "%%'";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $id = '<input type="hidden" name="Id" value=' . $row['productId'] . '>';
            $trStart = '<tr>';
            $img =    '<td> <img width="60" src=' . $row['productImage0'] . ' alt=""/></td>';
            $productName = '<td><a href="product_details.php?productId=' . $row['productId'] . '"> ' . $row['productName'] . '  Brand: ' . $row['brand'] . ', Model: ' . $row['model'] . ' </a></td>';
            $tdStart = 	  '<td>';
            $divStart =	'<div class="input-append">';
            $input =		'<input class="span1" style="max-width:34px" value=' . $row['quantity'] . ' id="appendedInputButtons" size="16" type="text" readonly>';
            $button =		'<button onclick="confirmation()" class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>';
            $divEnd = 		'</div>';
            $tdEnd = 	  '</td>';
            $trEnd =   '</tr>';
            $output = $output . ' ' . $id . ' ' . $trStart . ' ' . $img . ' ' . $productName . ' ' . $tdStart . ' ' . $divStart . ' ' . $input . ' ' . $button . ' ' . $divEnd . ' ' . $tdEnd . ' ' . $trEnd;
        }
    }
}
if ($output == "") {
    echo "Not Found!";
} else {
    echo $output;
}
