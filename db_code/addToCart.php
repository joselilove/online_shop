<?php
  SESSION_START();
    include 'connectDB.php';
    if (!isset($_SESSION['userId'])) {
        echo 'Please Login your Account!!';
    }
    else{
      $productId = $_GET['productId'];
      $orderquantity = $_GET['quantity'];

      $checkQuantity = 'SELECT * FROM product WHERE productId = '.$productId.'';
      $checkResult = mysqli_query($connect, $checkQuantity);
        while ($row = mysqli_fetch_array($checkResult)) {

          $compareInterger = ($row['quantity'] >= (int)$orderquantity + getOrderQuantity($productId));
          $idenInteger = ($orderquantity != 0);
          $bool = (is_numeric($orderquantity));

          if (!$bool) {
            echo "Invalid Input!";
          }
          else{
    if($orderquantity >= 0){
            if ($compareInterger && $idenInteger) {

            $totalPrice = $row['price'] * getTotalQuantity($productId, $orderquantity);
            
            $result = mysqli_query($connect, find_Identical_Result($productId, $orderquantity, $totalPrice));
            if ($result) {echo "This Item will be added to yourcart!";}         
            }

            else{
            echo "Input right quantity not greater than to stack or Not Equal to zero";
            }
    }else{
      echo "Invalid Number!";
    }


          }
        }


    }

function getTotalQuantity($productId, $orderquantity)
  { include 'connectDB.php';
$query = 'SELECT * FROM cart WHERE productIdConnect = '.$productId.' AND userIdConnect = '.$_SESSION['userId'].'';
  $resultCheckCart = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($resultCheckCart);
            if ($row != 0) {
              $queryResult = $row['orderQuantity'] + $orderquantity;
            }
            else{
              $queryResult = $orderquantity;
            }
            return $queryResult;
  }

function find_Identical_Result($productId, $orderquantity, $totalPrice)
{ include 'connectDB.php';
  $query = 'SELECT * FROM cart WHERE productIdConnect = '.$productId.' AND userIdConnect = '.$_SESSION['userId'].'';
  $resultCheckCart = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($resultCheckCart);
              if ($row !=0 ) 
              {
                $queryResult = "UPDATE cart SET orderQuantity =".$row['orderQuantity']." + ".$orderquantity.", totalPrice = ".$totalPrice." WHERE productIdConnect = ".$productId." AND userIdConnect = ".$_SESSION['userId']."";
              } 
              else
              {
                $queryResult = "INSERT INTO cart(productIdConnect, userIdConnect, orderQuantity, totalPrice) 
                  VALUES(".$productId.",".$_SESSION['userId'].",".$orderquantity.",".$totalPrice.")";
              }
              return $queryResult;
}

function getOrderQuantity($productId)
{ include 'connectDB.php';
      $checkQuantity = 'SELECT * FROM cart WHERE productIdConnect = '.$productId.'';
      $checkResult = mysqli_query($connect, $checkQuantity); 
        while ($row = mysqli_fetch_array($checkResult)) {
              return $row['orderQuantity'];
              echo $row['orderQuantity'];
        }
}




?>