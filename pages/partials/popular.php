<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Popular Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					<?php 

					

						require_once "models/products/product_functions.php";

						$newProducts = getNewProducts();
						
						foreach($newProducts as $product):

					?>	

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="assets/images/item-07.jpg" alt="<?=$product->alt?>">
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									<?=$product->product_name?>
								</a>

								<span class="block2-newprice m-text8 p-r-5">
									<?=$product->price?>
								</span>
							</div>
						</div>
					</div>

						<?php endforeach; ?>
				</div>
			</div>

		</div>
	</section>