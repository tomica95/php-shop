<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<?php 
					require_once "models/products/product_functions.php";
					$expensive = mostExpensiveProducts();
						
					foreach($expensive as $product):
					
					?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?=$product->small_picture?>" width="400" height="230">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="index.php?page=product&id=<?=$product->id?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?=$product->product_name ?>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>