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
                        <li><a href="manage.php">Manage</a> <span class="divider">/</span></li>
                        <li class="altctive">Delete Products</li>
                    </ul>
                    <h3> Delete Product<a href="products.php?categoryData=All" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
                    <hr class="soft" />
                    <form>
                        <input type="text" name="search" placeholder="Search Product Name.." onkeyup="show_To_Be_Delete_Product()">
                    </form>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer ================================================================== -->
    <?php include 'template/footer.php'; ?>
    <!-- Footer end ================================================================== -->
</body>

</html>
<script type="text/javascript">
    function show_To_Be_Delete_Product() {
        search = document.getElementsByName('search')[1].value;
        destination = "db_code/search_show_delete.php?search=" + search;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('result').innerHTML = xhr.responseText;
            }
        }
    }

    function deleteProduct() {
        id = document.getElementsByName('Id')[0].value;
        destination = "db_code/deleteProductDb.php?id=" + id;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", destination, true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('' + xhr.responseText);
                show_To_Be_Delete_Product();
            }
        }
    }

    function confirmation() {
        var r = confirm("Are you sure you want to permanently delete this file?");
        if (r) {
            deleteProduct();
        }
    }
</script>