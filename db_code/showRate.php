<?php
SESSION_START();
include 'connectDB.php';

$productId = $_GET['productId'];
$output1 = 0;
$output2 = 0;
$output3 = 0;
$output4 = 0;
$output5 = 0;
$query1 = "SELECT * FROM rate WHERE productRate = '1' and productIdConnect = '$productId' ";
$query2 = "SELECT * FROM rate WHERE productRate = '2' and productIdConnect = '$productId' ";
$query3 = "SELECT * FROM rate WHERE productRate = '3' and productIdConnect = '$productId' ";
$query4 = "SELECT * FROM rate WHERE productRate = '4' and productIdConnect = '$productId' ";
$query5 = "SELECT * FROM rate WHERE productRate = '5' and productIdConnect = '$productId' ";
$str='';
$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);
$result3 = mysqli_query($connect, $query3);
$result4 = mysqli_query($connect, $query4);
$result5 = mysqli_query($connect, $query5);

while ($row = mysqli_fetch_array($result1)) {
		$output1 = $output1 + 1;
}
while ($row = mysqli_fetch_array($result2)) {
		$output2 = $output2 + 1;
}
while ($row = mysqli_fetch_array($result3)) {
		$output3 = $output3 + 1;
}
while ($row = mysqli_fetch_array($result4)) {
		$output4 = $output4 + 1;
}
while ($row = mysqli_fetch_array($result5)) {
		$output5 = $output5 + 1;
}
echo "<BR>1 STAR  = ".$output1. " VOTE<br>";
echo "2 STAR  = ".$output2. " VOTE<BR>";
echo "3 STAR  = ".$output3. " VOTE<BR>";
echo "4 STAR  = ".$output4. " VOTE<BR>";
echo "5 STAR  = ".$output5. " VOTE<BR>";
?> 		