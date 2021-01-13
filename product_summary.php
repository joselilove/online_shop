<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include 'db_code\connectDB.php';
	include 'template\Navbar.php';
	include 'template\OtherCSS.php';
	if (!isset($_SESSION['username'])) {
		echo '
 		<script type="text/javascript">
 		alert("No Account Login!!");
		document.location = "index.php";
		</script>';
	}
	?>
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
						<li class="active"> SHOPPING CART</li>
					</ul>
					<h3> SHOPPING CART<a href="products.php?categoryData=All" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
					<hr class="soft" />

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Product</th>
								<th>Description</th>
								<th>Quantity/Update</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody id="cartResult">
						</tbody>
					</table>


					<table class="table table-bordered">
						<tr>
							<th>DELIVER YOUR ITEM </th>
						</tr>
						<tr>
							<td>
								<form class="form-horizontal">
									<div class="control-group">
										<label class="control-label" for="inputCountry">Address </label>
										<div class="controls">
											<input type="text" id="address" placeholder="Country">
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button type="button" class="btn" onclick="deliverItem()">DELIVER </button>
										</div>
									</div>
								</form>
							</td>
						</tr>
					</table>
					<a href="products.php?categoryData=All" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>

				</div>
			</div>
		</div>
	</div>
	<!-- Footer start ================================================================== -->
	<?php include 'template\footer.php'; ?>
	<!-- Footer end ==================================================================== -->
</body>

</html>

<script type="text/javascript">
	function showProductSaved(userId) {
		destination = "db_code/showCart.php?userId=" + userId;
		xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				var saved = xhr.responseText;
				document.getElementById('cartResult').innerHTML = xhr.responseText;
			}
		}
	}

	function minusQuantity(productId, quantity) {
		var data = 1;
		var operator = '-';
		destination = "db_code/changeQuantity.php?data=" + data + "&operator=" + operator + "&productId=" + productId + "&quantity=" + quantity;
		xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				var userId = '<?php echo $_SESSION['userId']; ?>';
				showUpdateCart(productId, userId);

			}
		}
	}

	function plusQuantity(productId, quantity) {
		var data = 1;
		var operator = '+';
		destination = "db_code/changeQuantity.php?data=" + data + "&operator=" + operator + "&productId=" + productId + "&quantity=" + quantity;
		xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				var userId = '<?php echo $_SESSION['userId']; ?>';
				showUpdateCart(productId, userId);
			}
		}
	}

	function showUpdateCart(productId, userId) {
		destination = "db_code/showUpdateCart.php?userId=" + userId + "&productId=" + productId;
		xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById('cartResult').innerHTML = xhr.responseText;

			}
		}
	}

	function deleteProductCart(productId) {
		var r = confirm("Delete this to your Cart?");
		var userId = '<?php echo $_SESSION['userId']; ?>';
		if (r) {
			destination = "db_code/deleteProductCart.php?productId=" + productId + "&userId=" + userId;
			xhr = new XMLHttpRequest();
			xhr.open("GET", destination, true);
			xhr.send();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					showProductSaved(userId);
				}
			}
		}
	}

	function deliverItem() {
		var address = document.getElementById('address').value;
		var productIdCheck = document.getElementsByName('proId')[0].value;
		if (productIdCheck != null) {
			var r = confirm("Do you wish to deliver this Item? There is no turning back!!");
			if (r) {
				destination = "db_code/deliverItem.php?address=" + address + "&prodId=" + productIdCheck;
				xhr = new XMLHttpRequest;
				xhr.open("GET", destination, true);
				xhr.send();
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						alert(xhr.responseText);
						document.getElementById('address').value = '';
						showProductSaved('<?php echo $_SESSION['userId']; ?>');
					}
				}
			}
		} else {
			alert("Your Cart is Empty");
			document.getElementById('address').value = '';
		}
	}

	window.addEventListener('load', function(event) {
		var userId = '<?php echo $_SESSION['userId']; ?>';
		showProductSaved(userId);
	});
</script>