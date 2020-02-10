<?php
	include 'connectDB.php';
	$output = '';

if (isset($_GET['search'])) {
	if ($_GET['search']=="") {

		echo "Search Now!!";
	}
	else{
		$search = mysqli_real_escape_string($connect, $_GET['search']);
		$search = (isset($search)) ? '' : $search;
	$sql = "SELECT * FROM product WHERE productId = ".$search;
	$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {
	$id = '<input type="hidden" name="Id" value='.$row['productId'].'>';
	//$productName =  'Product Name: <input type="text" name="productName" placeholder="Product Name" required value='.$row['productName'].'><br>';
	$productName =	'Product Name: <textarea style="width: 90%;" rows="1" cols="40" name="productName" placeholder="Product Name" required>'.$row['productName'].'</textarea><br>';
	$category = 
		"Category:<select name='category' required>
			<option value='Camera'>Camera's</option>
			<option value='Tablet'>Tablets</option>
			<option value='Laptop'>Laptop</option>
			<option value='Security Camera'>Security Camera</option>
			<option value='Mobile Phone'>Mobile Phone</option>
			<option value='Women Clothing'>Women's Clothing</option>
			<option value='Women Shoes'>Women's Shoes</option>
			<option value='Women Hand Bag'>Womens Hand Bags</option>
			<option value='Men Clothing'>Men's Clothing</option>
			<option value='Men Shoes'>Men's Shoes</option>
			<option value='Men Bag'>Men's Bag</option>
			<option value='Men Boots'>Men's Boots</option>
			<option value='Bath'>Bath</option>
			<option value='Bedding'>Bedding</option>
			<option value='Furniture'>Furniture</option>
			<option value='Healt & Beauty'>Health & Beauty</option>
			<option value='Sports'>Sports</option>
		</select>";
	$price = 'Price: <input type="text" name="price" placeholder="Price" value='.$row['price'].'>';
	$quantity = 'Quantity: <input type="number" class="span1" name="quantity" placeholder="Qty." value='.$row['quantity'].' />';
	$file = 'Product Image: <input type="file" name="file[]" id="file" multiple="multiple" accept="image/*" required onclick="removePre()" onchange="handleUpload()"><br>';
	$show_image = '<div id="image_result">
						<input type="text" id="image0" value='.$row['productImage0'].'>
						<img src='.$row['productImage0'].' style="width:200px; height:400px;">
						<input type="text" id="image1" value='.$row['productImage1'].'>
						<img src='.$row['productImage1'].' style="width:200px; height:400px;">
						<input type="text" id="image2" value='.$row['productImage2'].'>
						<img src='.$row['productImage2'].' style="width:200px; height:400px;">
						<input type="text" id="image3" value='.$row['productImage3'].'>
						<img src='.$row['productImage3'].' style="width:200px; height:400px;">
					</div>';
	$release = 'Date Release: <input type="date" name="release" value='.$row['released'].'>';
	$brand = '<br>Brand: <input type="text" name="brand" value='.$row['brand'].' required placeholder="Brand">';
	$model = 'Model: <input type="text" name="model" value='.$row['model'].' required placeholder="Model">';
	$description = 'Description: <textarea style="width: 90%;" rows="3" cols="60" name="description" placeholder="Description" required>'.$row['productDescription'].'</textarea><br>';
	$output = $id.' '.$productName.' '.$category.' '.$price.' '.$quantity.' '.$file.' '.$show_image.' '.$release.' '.$brand.' '.$model.' '.$description;
}
	}
	
}
if($output == ""){
	echo "Not Found!";
}
else{
	echo $output;
}
