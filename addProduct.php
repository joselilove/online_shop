<?php

if (!empty($_FILES['file'])) {
    foreach ($_FILES['file']['name'] as $key => $name) {
        if ($_FILES['file']['error'][$key] == 0 && move_uploaded_file($_FILES['file']['tmp_name'][$key], "image/{$name}")) {
            $uploaded[] = $name;
        }
    }
    if (!empty($_POST['ajax'])) {
        die(json_encode($uploaded));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'db_code/connectDB.php';
    include 'template/Navbar.php';
    include 'template/OtherCSS.php';
    ?>
    <script type="text/javascript" src="../NiJo/js/uploadImage.js?v=6"></script>
    <style type="text/css">
        #image0 {
            display: none;
        }

        #image1 {
            display: none;
        }

        #image2 {
            display: none;
        }

        #image3 {
            display: none;
        }
    </style>
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
                        <li><a href="manage.php">Manage</a> <span class="divider">/</span></li>
                        <li class="altctive">Add Product</li>
                    </ul>
                    <div class="row">
                        <div class="span6">
                            <h3> Add Product<a href="products.php?categoryData=All" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
                            <hr class="soft" />
                            <form action="" method="POST" enctype="multipart/form-data" id="myForm">
                                <input type="text" name="productName" placeholder="Product Name" required><br>
                                <select name="category" required>
                                    <option value="Camera">Camera</option>
                                    <option value="Tablet">Tablets</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Security Camera">Security Camera</option>
                                    <option value="Mobile Phone">Mobile Phone</option>
                                    <option value="Women Clothing">Women's Clothing</option>
                                    <option value="Women Shoes">Women's Shoes</option>
                                    <option value="Women Hand Bag">Womens Hand Bags</option>
                                    <option value="Men Clothing">Men's Clothing</option>
                                    <option value="Men Shoes">Men's Shoes</option>
                                    <option value="Men Bag">Men's Bag</option>
                                    <option value="Men Boots">Men's Boots</option>
                                    <option value="Bath">Bath</option>
                                    <option value="Bedding">Bedding</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Healt & Beauty">Health & Beauty</option>
                                    <option value="Sports">Sports</option>
                                </select>
                                <input type="text" name="price" placeholder="Price">
                                <input type="number" class="span1" name="quantity" placeholder="Qty." />
                                Product Image: <input type="file" name="file[]" id="file" multiple="multiple" accept="image/*" required onclick="removePre()" onchange="handleUpload()"><br>
                                <div id="image_result"></div>
                                <input type="date" name="release" required placeholder="Released on">
                                <input type="text" name="brand" required placeholder="Brand">
                                <input type="text" name="model" required placeholder="Model">
                                <textarea style="width: 90%;" rows="3" cols="60" name="description" placeholder="Description" required></textarea><br>
                                <button type="button" class="btn btn-large btn-primary pull-right" onclick="add_product()"> Add Item<i class=" icon-shopping-cart"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer ================================================================== -->
    <?php include 'template/footer.php'; ?>
    <!-- Footer End ================================================================== -->
</body>

</html>
<script type="text/javascript">
    function add_product() {
        productName = document.getElementsByName('productName')[0].value;
        category = document.getElementsByName('category')[0].value;
        price = document.getElementsByName('price')[0].value;
        quantity = document.getElementsByName('quantity')[0].value;
        image0 = document.getElementById('image0').value;
        image1 = document.getElementById('image1').value;
        image2 = document.getElementById('image2').value;
        image3 = document.getElementById('image3').value;
        release = document.getElementsByName('release')[0].value;
        brand = document.getElementsByName('brand')[0].value;
        model = document.getElementsByName('model')[0].value;
        description = document.getElementsByName('description')[1].value;
        destination = "db_code/addProductDb.php?productName=" + productName +
            " &category=" + category + "&price=" + price +
            " &quantity= " + quantity + "&image0=" + image0 +
            " &image1=" + image1 + "&image2=" + image2 +
            " &image3=" + image3 + "&release=" + release +
            " &brand=" + brand + "&model=" + model +
            " &description=" + description;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText);
                if (xhr.responseText == 'Product Added!') {
                    document.getElementById('file').value = "";
                    document.getElementsByName('productName')[0].value = "";
                    document.getElementsByName('category')[0].value = "Camera's";
                    document.getElementsByName('price')[0].value = "";
                    document.getElementsByName('quantity')[0].value = "";
                    document.getElementsByName('release')[0].value = "";
                    document.getElementsByName('brand')[0].value = "";
                    document.getElementsByName('model')[0].value = "";
                    document.getElementsByName('description')[1].value = "";
                    document.getElementById('file').style.display = "block";
                    divTop = document.getElementById('image_result');
                    for (var i = 0; i <= 100; i++) {
                        divTop.removeChild(divTop.childNodes[0]);
                    }
                }
            }
        }
    }
</script>