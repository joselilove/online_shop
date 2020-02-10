<?php
	include 'connectDB.php';
$output = '';
$liStart = '';
$div1Start = '';
$a = '';
$div2Start = '';
$h5 = '';
$p = '';
$h4 = '';
$div1End = '';
$div2End = '';
$liEnd = '';
	$search = mysqli_real_escape_string($connect, $_GET['search']);
	$search = (isset($search)) ? '' : $search;
	$query = "select * from product where productName like '".$search."%%'  AND quantity >=1 order by productId DESC limit 6";
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result)) {
	$liStart   ='<li class="span3">';
	$div1Start ='<div class="thumbnail">';
	$a 		   ='<a  href="product_details.php?productId='.$row['productId'].'"><img src="'.$row['productImage0'].'" style="width: 200px; height: 200px;" alt=""/></a>';
	$div2Start ='<div class="caption">';
	$h5 	   ='<h5>'.substr($row['productName'],0,20).'...</h5>';
	$p		   ='<p>Brand: '.$row['brand'].'</p>';
	$h4		   ='<h4 style="text-align:center">
				<a class="btn" href="product_details.php?productId='.$row['productId'].'"> <i class="icon-zoom-in"></i></a> 
				<a class="btn" href="product_details.php?productId='.$row['productId'].'">Add to <i class="icon-shopping-cart"></i></a> 
				<a class="btn btn-primary" href="product_details.php?productId='.$row['productId'].'">php'.$row['price'].'</a></h4>';
	$div1End   ='</div>';
	$div2End   ='</div>';
	$liEnd 	   ='</li>';	
$output = $output.' '.$liStart.' '.$div1Start.' '.$a.' '.$div2Start.' '.$h5.' '.$p.' '.$h4.' '.$div1End.' '.$div2End.' '.$liEnd;
	}
	if ($output == '') {
		echo "Not Found.";
	}
	else{
		echo $output;
	}
