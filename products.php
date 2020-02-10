<!DOCTYPE html>
<html lang="en">

<head></head>
	<?php
	include 'db_code/connectDB.php';
	include 'template/NavbarCat.php';
	include 'template/OtherCSS.php';
	?>
	<link rel="stylesheet" type="text/css" href="style.css?v=11">
</head>
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			<?php include 'template/SiderbarCat.php'; ?>
			<!-- Sidebar end=============================================== -->
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a> <span class="divider">/</span></li>
					<li class="active">Products Name</li>
				</ul>
				<div id="categoryAvailableResult"></div>
				<hr class="soft" />
				<hr class="soft" />
				<form class="form-horizontal span6">
					<div class="control-group">
						<label class="control-label alignL">Sort By </label>
						<select name="filter" onchange="showProductCategory('<?php echo $_GET['categoryData']; ?>')">
							<option value="ORDER BY productId DESC">Latest - Old</option>
							<option value="ORDER BY productId ASC">Old - Latest</option>
							<option value="ORDER BY price ASC">Price Lowest first</option>
							<option value="ORDER BY price DESC">Price Highest first</option>
						</select>
					</div>
				</form>
				<br class="clr" />
				<div class="tab-content">
					<!-- Product Start -->

					<div class="tab-pane  active" id="blockView">
						<ul class="thumbnails" id="productCategoryResult"></ul>
						<hr class="soft" />
					</div>


					<!-- Product End -->
				</div>
				<br class="clr" />
			</div>
		</div>
	</div>
</div>
<!-- Footer start ================================================================== -->
<?php include 'template/footer.php'; ?>
<!-- Footer end ==================================================================== -->
</body>

</html>
<!--<script src="jquery.js"></script>-->
<script type="text/javascript">
	var offset = 0;

	function showProductCategory(category) {
		var pagePlus = 0;
		pagePlus = pagePlus + offset;
		var min = document.getElementsByName('min_price')[0].value;
		if (min == "") {
			min = 0;
		}
		var max = document.getElementsByName('max_price')[0].value;
		if (max == "") {
			max = 99999;
		}
		var max_min = 'AND price BETWEEN ' + min + ' AND ' + max + '';
		var search = document.getElementsByName('search')[0].value;
		var filter = document.getElementsByName('filter')[0].value;
		var brandValue = new Array(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
		var cboxes = document.getElementsByName('brand[]');
		var len = cboxes.length;
		var count = 0;
		for (var i = 0; i < len; i++) {
			if (cboxes[i].checked) {
				brandValue[count] = cboxes[i].value;
				count++;
			}
			console.log(brandValue[count]);
		}
		destination = "db_code/showProductByCategory.php?category=" + category + " &search=" + search + "&filter=" + filter +
			"&brand1=" + brandValue[0] + "&brand2=" + brandValue[1] + "&brand3=" + brandValue[2] +
			"&brand4=" + brandValue[3] + "&brand5=" + brandValue[4] + "&brand6=" + brandValue[5] +
			"&brand7=" + brandValue[6] + "&brand8=" + brandValue[7] + "&max_min=" + max_min + "&pagePlus=" + pagePlus;
		var xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById('productCategoryResult').innerHTML = xhr.responseText;
				document.getElementsByName('search')[0].value = '';
				//brandChange(getCategory());
			}
		}
	}

	function brandChange(category) {
		destination = "db_code/brandChange.php?categoryName=" + category;
		var xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById('brand_result').innerHTML = xhr.responseText;
			}
		}
	}


	function showCategoryAvailable(categoryName) {
		destination = "db_code/showCategoryAvailable.php?categoryName=" + categoryName;
		var xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById('categoryAvailableResult').innerHTML = xhr.responseText;
				document.getElementsByName('search')[0].value = '';
			}
		}
		showProductCategory(categoryName);
	}

	function getCategory() {
		var getCate = document.getElementsByName('hiddenCategory')[0].value;
		return getCate;
	}

	function getPlusPage(ex) {
		if (ex == 'ex') {
			offset = 0;
		} else {

			offset = offset + 3;
		}
	}


	window.addEventListener('load', function(event) {
		var categoryData = '<?php echo $_GET['categoryData']; ?>';
		showCategoryAvailable(categoryData);
		showProductCategory(categoryData);
		//brandChange(categoryData);
	});

	$(window).scroll(function() {
		if ($(window).scrollTop() == $(document).height() - $(window).height()) {
			getPlusPage('no');
			showProductCategory(getCategory());
		}
	});
</script>