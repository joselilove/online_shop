<?php
SESSION_START();
include 'connectDB.php';
$productId  = $_GET['productId'];
$output = '';
$query = 'SELECT * FROM comment, costumer, product, rate WHERE 
    rate.productIdConnect = productId AND
      productId = comment.productIdConnect AND
       costumerID = costumerIdConnect AND
    rate.userIdConnect = costumerIdConnect AND
    comment.productIdConnect = ' . $productId . ' 
    ORDER BY commentId DESC';
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result)) {

    $str = '';
    //if ($row['userIdConnect'] == $row['costumerID']) {
    for ($i = 0; $i < $row['productRate']; $i++) {
        $str .= '<span class="fa fa-star checked">	</span>';
        //}
    }
    $username = '<p>By: <b>' . $row['username'] . '</b></p>';
    $comment = '<p>' . $row['commentDescription'] . '</p>';
    $date = '<p>' . $row['commentDate'] . '</p><hr>';

    $output = $output . ' ' . $str . ' ' . $username . ' ' . $comment . ' ' . $date;
}
echo $output;
