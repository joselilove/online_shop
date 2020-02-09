<!DOCTYPE html>
<html lang="en">
<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
		<div class="well well-small" id="show_cart"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">Items in your cart  <span class="badge badge-warning pull-right">Click</span></a></div>
		<div class="well well-small" id="show_manage"><a id="myCart" href="manage.php"><img src="themes/images/ico-cart.png" alt="cart">Manage Product  <span class="badge badge-warning pull-right">Click</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a> ELECTRONICS</a>
				<ul>
				<li><a class="active" href="#" onclick="showCategoryAvailable('Camera')"><i class="icon-chevron-right"></i>Cameras </a></li>
				<li><a href="#" onclick="showCategoryAvailable('Tablet'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Tablets</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Laptop'); getPlusPage('ex'); "><i class="icon-chevron-right"></i>laptop</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Security Camera'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Security Camera</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Mobile Phone'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Mobile Phone</a></li>
				</ul>
			</li>
			<li class="subMenu"><a> WOMEN'S FASHION </a>
			<ul style="display:none">
				<li><a href="#" onclick="showCategoryAvailable('Women Clothing'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Women's Clothing</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Women Shoes'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Women's Shoes</a></li>												
				<li><a href="#" onclick="showCategoryAvailable('Women Hand Bag'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Women's Hand Bags</a></li>													
			</ul>
			</li>
				<li class="subMenu"><a> MEN'S FASHION</a>
			<ul style="display:none">
				<li><a href="#" onclick="showCategoryAvailable('Men Clothing'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Men's Clothings</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Men Shoes'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Men's Shoes</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Men Bag'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Men's Bag</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Men Boots'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Men's Boots</a></li>

			</ul>
			</li>
			<li class="subMenu"><a>HOME & LIFE STYLE</a>
				<ul style="display:none">
				<li><a href="#" onclick="showCategoryAvailable('Bath'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Bath</a></li>
				<li><a href="#" onclick="showCategoryAvailable('Bedding'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Bedding</a></li>												
				<li><a href="#" onclick="showCategoryAvailable('Furniture'); getPlusPage('ex');"><i class="icon-chevron-right"></i>Furniture</a></li>												
			</ul>
			</li>
			<li><a href="#" onclick="showCategoryAvailable('Health & Beauty'); getPlusPage('ex');">HEALTH & BEAUTY</a></li>
			<li><a href="#" onclick="showCategoryAvailable('Sports'); getPlusPage('ex');">SPORTS</a></li>
			<li><a href="#" onclick="showCategoryAvailable('All'); getPlusPage('ex');">ALL</a></li>
		</ul>
		<br/>
		<hr>

		<label><b> Brand </b></label>
		<div id="brand_result"></div>
		
		<input type='checkbox' class='check' name='brand[]' value='OR brand = "Samsung"' onclick='showProductCategory(getCategory())'> Samsung <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Sony'" 	onclick="showProductCategory(getCategory())"> Sony <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Canon'" onclick="showProductCategory(getCategory())"> Canon <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Lenovo'" onclick="showProductCategory(getCategory())"> Lenovo <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Acer'" onclick="showProductCategory(getCategory())"> Acer <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Asus'" onclick="showProductCategory(getCategory())"> Asus <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Hp'" onclick="showProductCategory(getCategory())"> Hp <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Dream Pairs'" onclick="showProductCategory(getCategory())"> Dream Pairs <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'Tkria'" onclick="showProductCategory(getCategory())"> Tkria <br>
		<input type="checkbox" class="check" name="brand[]" value="OR brand = 'WensLTD'" onclick="showProductCategory(getCategory())"> WensLTD <br>

		<hr><b> Price </b></label> <br>
		<input type="number" name="min_price" placeholder="Min" style="width: 50px;">
		<input type="number" name="max_price" placeholder="Max" style="width: 50px;">
		<input type="button" name="submit" value=">" onclick="showProductCategory(getCategory())">
		<hr>
		<label> <b></b> </label>




	</div>
<!-- Sidebar end=============================================== -->

</body>
</html>