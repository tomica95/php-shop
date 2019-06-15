<?php 
	require_once "models/products/product_functions.php";

	$product_id = $_GET['id'];

	$product = singleProduct($product_id);

	


?>
<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
					
						<div class="item-slick3" data-thumb="<?=$product->small_picture?>">
							<div class="wrap-pic-w">
								<img src="<?=$product->big_picture?>" alt="">
							</div>
						</div>

						

					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?=$product->product_name ?>
				</h4>

				<span class="m-text17">
					$<?=$product->price ?>
				</span>

				

				<!--  -->
				

				<div class="p-b-45">
					
					<span class="s-text8">Category:<?=$product->category_name?></span>
				</div>

				<form method="POST" action="models/products/exportToExcel.php">

						<input type="hidden" value="<?=$product->product_id?>" name="id">

						<input type="submit" value="Export to excel">

				</form>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
						<?=$product->description ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
						<?=$product->description ?>
						</p>
					</div>
				</div>

				
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	