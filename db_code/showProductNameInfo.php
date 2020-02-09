<?php
include 'connectDB.php';
	$productId	= $_GET['productId'];
$output = '';
$query          = 'SELECT * FROM product WHERE productId = '.$productId.'';
$result         = mysqli_query($connect, $query);
while ($row     = mysqli_fetch_array($result)) {
    $productName='<h3>'.$row['productName'].'';               
    $formStart  ='<hr><form method="POST" action="" class="form-horizontal qtyFrm">';
    $price      ='<label class="control-label"><span><b>PHP '.$row['price'].'.00</b></span></label>';
    $inputQ     ='<input type="number" name="quantity" class="span1" placeholder="Qty."/>';
    $hidden_q   ='<input type="hidden" name="hidden_q" value="<?php echo '.$row['productId'].' ?>">';
    $submit     ='<button type="button" class="btn btn-large btn-primary pull-right" onclick="addToCart('.$row['productId'].')"> Add to cart <i class=" icon-shopping-cart"></i></button>';
    $formEnd    ='</form><hr>';
    $quantity   ='<h4>'.$row['quantity'].' items in tock</h4>';
    $output = $output.' '.$productName.' '.$formStart.' '.$price.' '.$inputQ.' '.$hidden_q.' '.$submit.' '.$formEnd.' '.$quantity;
}
echo $output;
?>