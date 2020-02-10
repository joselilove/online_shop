<html lang="en">
  <head>
  	<?php
  	require '\db_code\connectDB.php';
  	require '\template\Navbar.php';
  	require '\template\OtherCSS.php';
  	?>
  </head>
 <?php require 'template\Slider.php';?>
<div id="mainBody">
	<div class="container">
	<div class="row">
<?php require 'template\Sidebar.php'; ?>
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
<?php require 'template\footer.php'; ?>
<!-- Footer end =================================================================== -->
</body>
</html>
<script type="text/javascript">
	
	function latestProduct(){
		var search = document.getElementsByName('search').value; 
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