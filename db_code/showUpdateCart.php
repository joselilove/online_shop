    <?php
    session_start();
    include 'connectDB.php';
    $output = '';
    $totalPrice = 0;
    $totalPricePerItem = 0;
    $userId = $_GET['userId'];
    $productId = $_GET['productId'];
    $query = "SELECT * FROM cart, product WHERE productId = productIdConnect AND userIdConnect = " . $userId . " AND productIdConnect = " . $productId;
    $result1 = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result1)) {
        $totalPricePerItem = $row['orderQuantity'] * $row['price'];
    }

    $queryResult = "UPDATE cart SET totalPrice = " . $totalPricePerItem . " WHERE productIdConnect = " . $productId . " AND userIdConnect = " . $_SESSION['userId'] . "";
    $result = mysqli_query($connect, $queryResult);

    $queryAdd = "SELECT * FROM cart WHERE userIdConnect = " . $userId;
    $result1Add = mysqli_query($connect, $queryAdd);
    while ($rowAdd = mysqli_fetch_array($result1Add)) {
        $totalPrice = $totalPrice + $rowAdd['totalPrice'];
    }


    $sql = "SELECT * FROM cart,product, costumer where productIdConnect = productId AND costumerID = userIdConnect AND  userIdConnect = " . $userId . "";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($connect, $result)) {
        $resultCart = '<tr>
                    <td> <img width="60" src="' . $row['productImage0'] . '" alt=""/></td>
                    <td><a href="product_details.php?productId=' . $row['productId'] . '"><b>' . $row['productName'] . '</b></a>
                    <br/>Brand : ' . $row['brand'] . ', Model : ' . $row['model'] . '</td>
                    <input type="hidden" name="proId" value=' . $row['productId'] . '>
                    <td>
                    <div class="input-append">
                    <input class="span1" style="max-width:34px" id="appendedInputButtons" size="16" type="text" value="' . $row['orderQuantity'] . '" name="orderQuantity" readonly>
                    <button class="btn" type="button" onclick="minusQuantity(' . $row['productId'] . ')"><i class="icon-minus"></i></button>
                    <button class="btn" type="button" onclick="plusQuantity(' . $row['productId'] . ')"><i class="icon-plus"></i></button>
                    <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>				
                    </div>
                    </td>
                    <td>PHP' . $row['price'] . '.00</td>
                    <td>PHP' . $row['totalPrice'] . '.00</td>
                    </tr>';
        $output = $output . ' ' . $resultCart;
    }
    $showTotalPrice =	'<tr>
                              <td colspan="4" style="text-align:right"><strong>TOTAL =</strong></td>
                              <td class="label label-important" style="display:block"> <strong> PHP' . $totalPrice . '.00 </strong></td>
                            </tr>';
    echo $output . ' ' . $showTotalPrice;
    ?>