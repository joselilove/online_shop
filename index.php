<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php
  	include 'db_code\connectDB.php';
  	include 'template\Navbar.php';
  	include 'template\OtherCSS.php';
  	?>
  </head>
 <?php include 'template\Slider.php';?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<?php include 'template\Sidebar.php'; ?>
<!-- Sidebar end=============================================== -->
<!-- Five Star Rating Product start =========================== -->
		<div class="span9">		
<!-- Five Star Rating Product end =============================================-->
<!-- Latest Products start ====================================================-->
<h4>Latest Products </h4>
	<ul class="thumbnails" id="latestProductResult"></ul>
<!--Latest Product End -->
		</div>
		</div>
	</div>
</div>
<!-- Latest Products end =========================================================-->

<!-- Footer start ================================================================= -->
<?php include 'template\footer.php'; ?>
<!-- Footer end =================================================================== -->
</body>
</html>
<script type="text/javascript">
	
	function latestProduct(){
		var search = document.getElementsByName('search')[0].value; 
		destination = "db_code/showLatestProductDb.php?search="+search;
		var xhr = new XMLHttpRequest();
		xhr.open("GET", destination, true);
		xhr.send();
		xhr.onreadystatechange=function(){
			if (xhr.readyState ==4 && xhr.status==200) {
				document.getElementById('latestProductResult').innerHTML = xhr.responseText;
			}
		}
	}
	

window.addEventListener('load', function (event){
	latestProduct();
});
</script>