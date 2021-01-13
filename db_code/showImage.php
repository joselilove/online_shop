<?php
include 'connectDB.php';
    $productId	= $_GET['productId'];
    $output		='';

$query = 'SELECT * FROM product WHERE productId = '.$productId.'';
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result)) {
    $firstImage	='<a href="'.$row['productImage0'].'"><img src="'.$row['productImage0'].'" style="width:100%"/></a>';
    $div1Start	='<div id="differentview" class="moreOptopm carousel slide">';
    $div2Start  ='<div class="carousel-inner">';
    $div3Start  ='<div class="item active">';
    $secondImage='<a href="'.$row['productImage1'].'"> <img style="width:29%" src="'.$row['productImage1'].'" alt=""/></a>';
    $thirdImage ='<a href="'.$row['productImage2'].'"> <img style="width:29%" src="'.$row['productImage2'].'" alt=""/></a>';
    $forthImage ='<a href="'.$row['productImage3'].'" > <img style="width:29%" src="'.$row['productImage3'].'" alt=""/></a>';
    $div1End    ='</div>';
    $div2End    ='</div>';
    $div3End    ='</div>';
    $output = $output.' '.$firstImage.' '.$div1Start.' '.$div2Start.' '.$div3Start.' '.$secondImage.' '.$thirdImage.' '.$forthImage.' '.$div1End.' '.$div2End.' '.$div3End;
}
echo $output;