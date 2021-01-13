<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include 'db_code\move_image_loc.php';
  	include 'db_code\connectDB.php';
  	include 'template\Navbar.php';
  	include 'template\OtherCSS.php';
  	?>
  	<script type="text/javascript" src="../NiJo/js/uploadImage.js?v=9"></script>
  	<style type="text/css">
  		#image0{
  			display: none;
  		}
  		#image1{
  			display: none;	
  		}
  		#image2{
  			display: none;
  		}
  		#image3{
  			display: none;
  		}
  	</style>
  </head>
<body>
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<?php include 'template\Sidebar.php'; ?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li><a href="manage.php">Manage</a> <span class="divider">/</span></li>
    <li class="altctive">Update PRODUCTS</li>
    </ul>	
	<div class="row">  
			<div class="span6">
				<h3>Update Product<a href="products.php?categoryData=All" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
	<form action="" method="POST">
		<input type="number" name="search" placeholder="Search Product through ID.." onkeyup="Search();">
	</form>	
	<form action="" method="POST" enctype="multipart/form-data" id="myForm">
		<div id="form_result">
		</div>
		<button type="button" class="btn btn-large btn-primary pull-right" onclick="updateProduct()"> Update Item<i class=" icon-shopping-cart"></i></button>
		</form>		
			</div>
	</div>
</div>
</div> </div>
</div>
<!-- Footer start ================================================================== -->
<?php include 'template\footer.php'; ?>
<!-- Footer end ================================================================== -->
</body>
</html>
<script type="text/javascript">
	function Search() {
		search = document.getElementsByName('search')[1].value;
		destination = "db_code/search_show_update.php?search="+search;
		var xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange=function(){
			if (xhr.readyState ==4 && xhr.status == 200) {
				document.getElementById("form_result").innerHTML = xhr.responseText;
			}
		}
	}
	function updateProduct(){
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
	id =  document.getElementsByName('Id')[0].value;
	destination = "db_code/updateProductDb.php?productName="+productName+
	" &category="+category+"&price="+price+
	" &quantity="+quantity+"&image0="+image0+
	" &image1="+image1+"&image2="+image2+ 
	" &image3="+image3+"&release="+release+
	" &brand="+brand+"&model="+model+
	" &description="+description+
	" &id="+id;
	var xhr = new XMLHttpRequest();
	xhr.open("GET", destination, true);
	xhr.send();
	xhr.onreadystatechange=function(){
		if (xhr.readyState ==4 && xhr.status == 200) {
		alert(xhr.responseText);
		document.getElementById('file').value = "";
		document.getElementsByName('productName')[0].value = "";
		document.getElementsByName('category')[0].value = "Camera's";
		document.getElementsByName('price')[0].value = "";
		document.getElementsByName('quantity')[0].value = "";
		document.getElementsByName('release')[0].value = "";
		document.getElementsByName('brand')[0].value = "";
		document.getElementsByName('model')[0].value = "";
		document.getElementsByName('description')[1].value = "";
		document.getElementsByName('search')[0].value = "";
		document.getElementById('file').style.display = "block";
		divTop = document.getElementById('image_result');
		for (var i = 0; i <= 100; i++) {
			divTop.removeChild(divTop.childNodes[0]);
			}
		}
	}
	}
</script>