<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'db_code/connectDB.php';
    include 'template/Navbar.php';
    include 'template/OtherCSS.php';
    ?>
</head>

<body>
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                <?php include 'template/Sidebar.php'; ?>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li><a href="products.php">Products</a> <span class="divider">/</span></li>
                        <li class="altctive">Product Details</li>
                    </ul>
                    <div class="row">
                        <div id="gallery" class="span3">

                            <!-- Image here -->
                            <?php
                            $productId    = $_GET['productId'];
                            $output        = '';

                            $query = 'SELECT * FROM product WHERE productId = ' . $productId . '';
                            $result = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                $firstImage    = '<a href="' . $row['productImage0'] . ' "><img src="' . $row['productImage0'] . '" style="width:100%"/></a>';
                                $div1Start    = '<div id="differentview" class="moreOptopm carousel slide">';
                                $div2Start  = '<div class="carousel-inner">';
                                $div3Start  = '<div class="item active">';
                                $secondImage = '<a href="' . $row['productImage1'] . '"> <img style="width:29%" src="' . $row['productImage1'] . '" alt=""/></a>';
                                $thirdImage = '<a href="' . $row['productImage2'] . '"> <img style="width:29%" src="' . $row['productImage2'] . '" alt=""/></a>';
                                $forthImage = '<a href="' . $row['productImage3'] . '"> <img style="width:29%" src="' . $row['productImage3'] . '" alt=""/></a>';
                                $div1End    = '</div>';
                                $div2End    = '</div>';
                                $div3End    = '</div>';
                                $output = $output . ' ' . $firstImage . ' ' . $div1Start . ' ' . $div2Start . ' ' . $div3Start . ' ' . $secondImage . ' ' . $thirdImage . ' ' . $forthImage . ' ' . $div1End . ' ' . $div2End . ' ' . $div3End;
                            }
                            echo $output;
                            ?>
                            <!-- Image End here -->
                            <form method="POST" action="">
                                <select id="selectBox" onchange="changeFunc()"">
                            <option>Rate</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
            </form><br>
            <div id=" txtHint">
                        </div>
                        <div id="showRate"></div>
                    </div>
                    <div class="span6">
                        <!-- Product Name Info Start Here -->
                        <div id="showProductNameInfo"></div>
                        <!-- Product Name Info End Here -->
                        <hr>
                        <a class="btn btn-small pull-right" href="#detail">More Details</a>
                        <br>
                        <a href="#" name="detail"></a>
                        <hr>
                    </div>

                    <div class="span9">
                        <ul id="productDetail" class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
                            <li><a href="#profile" data-toggle="tab">Review</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                <h4>Product Information</h4>
                                <!-- Product Information Start Here -->
                                <div id="productInformation"></div>
                                <!-- Product Information Start Here -->
                            </div>

                            <!-- Comment Here -->
                            <div class="tab-pane fade" id="profile">
                                <br class="clr" />
                                <div class="tab-content">
                                    <form>
                                        <textarea style="width: 90%;" rows="3" cols="60" name="comment" form="formAdd" required></textarea>
                                    </form>
                                    <input type="button" name="submit" value="submit" onclick="insertComment('<?php echo $_GET['productId']; ?>');">
                                    <hr>

                                    <div id="commentResut">
                                        <p>By:<b>sdsd</b> </p>
                                        <p>Comment Here</p>
                                        <hr>
                                    </div>

                                </div>
                                <br class="clr">
                                <!-- Comment Here -->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer start ================================================================== -->
    <?php include 'template/footer.php'; ?>
    <!-- Footer end ==================================================================== -->
</body>

</html>
<script type="text/javascript">
    //function showImage(productId){
    //	destination = "db_code/showImage.php?productId="+productId;
    //	var xhr = new XMLHttpRequest();
    //	xhr.open("GET", destination, true);
    //	xhr.send();
    //	xhr.onreadystatechange=function(){
    //		if (xhr.readyState ==4 && xhr.status ==200) {
    //			document.getElementById('ImageResult').innerHTML = xhr.responseText;
    //		}
    //	}
    //}	

    function showProductNameInfo(productId) {
        destination = "db_code/showProductNameInfo.php?productId=" + productId;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('showProductNameInfo').innerHTML = xhr.responseText;
            }
        }
    }

    function showProductInformation(productId) {
        destination = "db_code/showProductInformation.php?productId=" + productId;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('productInformation').innerHTML = xhr.responseText;
            }
        }
    }

    function insertComment(productId) {
        var comment = document.getElementsByName('comment')[0].value;
        destination = "db_code/insertComment.php?productId=" + productId + " &comment=" + comment;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText == 'Please Login your Account!!') {
                    alert(xhr.responseText);
                } else {
                    document.getElementsByName('comment')[0].value = '';
                    displayComment(productId);
                }
            }
        }
    }

    function displayComment(productId) {
        destination = "db_code/displayComment.php?productId=" + productId;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('commentResut').innerHTML = xhr.responseText;
            }
        }
    }

    function addToCart(productId) {
        quantity = document.getElementsByName('quantity')[0].value;
        destination = "db_code/addToCart.php?productId=" + productId + "&quantity=" + quantity;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText);
                document.getElementsByName('quantity')[0].value = "";
                showProductNameInfo(productId);
            }
        }
    }

    function setRate(productId) {
        destination = "db_code/displayRate.php?productId=" + productId;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('txtHint').innerHTML = xhr.responseText;
            }
        }
    }

    function showRate(productId) {

        destination = "db_code/showRate.php?productId=" + productId;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('showRate').innerHTML = xhr.responseText;
            }
        }
    }

    function changeFunc() {
        var selectBox = document.getElementById("selectBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        obj = {
            "rate": "",
            "itemId": "",
            "customerId": ""
        };
        obj.rate = selectedValue;
        obj.itemId = '<?php echo $_GET['productId']; ?>';
        var dbParam = JSON.stringify(obj);

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                setRate(obj.itemId);
                showRate(obj.itemId);
                displayComment('<?php echo $_GET['productId']; ?>');
                if (xmlhttp.responseText != "") {
                    alert(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.open("GET", "insertRate.php?x=" + dbParam, true);
        xmlhttp.send();
    }

    window.addEventListener('load', function(event) {
        var productId = '<?php echo $_GET['productId']; ?>';
        //showImage(productId);
        showProductNameInfo(productId);
        showProductInformation(productId);
        displayComment(productId);
        setRate(productId);
        showRate(productId);
    });
</script>