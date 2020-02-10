<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include 'db_code/connectDB.php';
	include 'template/Navbar.php';
	include 'template/OtherCSS.php';
	if (!isset($_SESSION['username'])) {
		echo '
 		<script type="text/javascript">
 		alert("No Account Login!!");
		document.location = "index.php";
		</script>';
	} else {
		if (strncmp($_SESSION['username'], 'admin', 5) != 0) {
			echo '
 		<script type="text/javascript">
 		alert("For Admin User Only!!");
		document.location = "index.php";
		</script>';
		}
	}

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
						<li class="altctive">MANAGE PRODUCTS</li>
					</ul>
					<div class="row">
						<div class="span6">
							<h3>MANAGE ITEM</h3>
							<a href="addProduct.php"><button type="submit" class="btn btn-large btn-primary pull-right"> ADD ITEM<i class=" icon-shopping-cart"></i></button></a>
							<a href="updateProduct.php"><button type="submit" class="btn btn-large btn-primary pull-right"> UPDATE ITEM<i class=" icon-shopping-cart"></i></button></a>
							<a href="deleteProduct.php"><button type="submit" class="btn btn-large btn-primary pull-right"> DELETE ITEM<i class=" icon-shopping-cart"></i></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MainBody End ============================= -->
	<!-- Footer ================================================================== -->
	<?php include 'template/footer.php'; ?>
</body>

</html>