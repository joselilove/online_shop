<?php
SESSION_START();
include 'connectDB.php';
$category = $_GET['category'];
$search = $_GET['search'];
$filter = $_GET['filter'];
$_SESSION['category'] = $category;
$brand1 = $_GET['brand1'];
$brand2 = $_GET['brand2'];
$brand3 = $_GET['brand3'];
$brand4 = $_GET['brand4'];
$brand5 = $_GET['brand5'];
$brand6 = $_GET['brand6'];
$brand7 = $_GET['brand7'];
$brand8 = $_GET['brand8'];
$max_min = $_GET['max_min'];
$pagePlus = $_GET['pagePlus'];
$startPage = 6;
$startPage = $startPage + $pagePlus;
$and = 'AND';
$liStart 	= '';
$div1Start 	= '';
$a 			= '';
$div2Start 	= '';
$h5	 		= '';
$p	 		= '';
$h4 		= '';
$div1End 	= '';
$div2End 	= '';
$liEnd 		= '';
$output 	= '';
if ($brand1 == " ") {
    $and = "";
}
if (strncmp($category, 'All', 3) != 0) {
    $query 	= "SELECT * FROM product WHERE category = '" . $category . "'  and productName LIKE '" . $search . "%%' " . $and . " " . substr($brand1, 3, 50) . " " . $brand2 . " " . $brand3 . " " . $brand4 . " " . $brand5 . " " . $brand6 . " " . $brand7 . " " . $brand8 . " " . $max_min . " " . $filter . " LIMIT 0," . $startPage . "";
} else {
    $query 	= "SELECT * FROM product  where productName like '" . $search . "%%'  AND quantity >=1 " . $and . " " . substr($brand1, 3, 50) . " " . $brand2 . " " . $brand3 . " " . $brand4 . " " . $brand5 . " " . $brand6 . " " . $brand7 . " " . $brand8 . " " . $max_min . " " . $filter . " LIMIT 0," . $startPage . "";
}
$result = mysqli_query($connect, $query);
echo "<script>
            console.log(" . $query . ");
        </script>";
while ($row = mysqli_fetch_array($result)) {
    $liStart 	= '<li class="span3">';
    $div1Start	= '<div class="thumbnail">
                <div class="container1">
                  <div class="interior">';
    $a 			= '<a href="#open-modal' . $row['productId'] . '"><img src="' . $row['productImage0'] . '" style="width: 200px; height: 200px;" alt=""/></a>';
    $div2Start	= '<div class="caption">';
    $h5			= '<h5>' . substr($row['productName'], 0, 20) . '...</h5>';
    $p 			= '<p>Brand: ' . $row['brand'] . '</p>';
    $h4 		= '<h4 style="text-align:center">
                <a class="btn" href="product_details.php?productId=' . $row['productId'] . '"> <i class="icon-zoom-in"></i></a> 
                <a class="btn" href="product_details.php?productId=' . $row['productId'] . '">Add to <i class="icon-shopping-cart"></i></a> 
                <a class="btn btn-primary" href="product_details.php?productId=' . $row['productId'] . '">php' . substr($row['price'], 0, 5) . '</a></h4>
                  </div>
                </div>';
    $div1End	= '</div>';
    $div2End	= '</div>';
    $liEnd		= '</li>


<div id="open-modal' . $row['productId'] . '" class="modal-window">
  <div>
    <a href="#modal-close" title="Close" class="modal-close">Close</a>
    <h1>' . $row['productName'] . '</h1>
    <img src="' . $row['productImage0'] . '" style="width: 600px; height: 500px;">
    <center><a class="btn btn-primary"' . $row['productId'] . '">php' . $row['price']	. '</a></center>
    </div>
</div>

    ';
    $output = $output . ' ' . $liStart . ' ' . $div1Start . ' ' . $a . ' ' . $div2Start . ' ' . $h5 . ' ' . $p . ' ' . $h4 . ' ' . $div1End . ' ' . $div2End . ' ' . $liEnd;
}
echo $output;
