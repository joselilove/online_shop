<?php
SESSION_START();
include 'connectDB.php';
$productId = $_GET['productId'];
$output ='';
$str='';
if (isset($_SESSION['userId'])) {
$query = "SELECT * FROM rate WHERE productIdConnect = '$productId' AND  userIdConnect = ".$_SESSION['userId']." ";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {
        $output = $row['productRate'];
        $str='';
        for ($i=0; $i <$row['productRate'] ; $i++) { 
            $str .= '<span class="fa fa-star checked">	</span>';
        }
}
if($output == "" || $output == "0"){
echo "";
}
else{
    echo $str;
}
}
