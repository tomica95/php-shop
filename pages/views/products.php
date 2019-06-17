<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54" id="kategorije">
						<li class="p-t-4">
								<a href="index.php?page=shop" class="s-text13 active1">
									All
								</a>
							</li>
						<?php 

							require_once "models/categories/category_functions.php";

							$categories = allCategories();

							foreach($categories as $category):

						?>
							<li class="p-t-4 category" data-id="<?=$category->id?>">
								<a href="#" class="s-text13 active1" >
									<?=$category->category_name ?>
								</a>
							</li>

							<?php 

							endforeach;
							
							?>

						</ul>

						<!--  -->
					

						
						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting" id="sort">
									<option value="default">Default</option>
									<option value="name-asc">Name ASC</option>
									<option value="name-desc">Name DESC</option>
									<option value="price-l-h">Price: low to high</option>
									<option value="price-h-l">Price: high to low</option>
								</select>
							</div>

							
						</div>

						
					</div>

					<!-- Product -->
					<div class="row" id="products">
					<!-- start foreach -->
					<?php 

						include "models/products/product_functions.php"; 

						$limit =  isset($_GET['limit'])? $_GET['limit'] : 0;
                 		$products = getProductsWithPicture($limit);

						foreach($products as $product):

						
					?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?=$product->small_picture?>">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="index.php?page=product&id=<?=$product->product_id?>" class="block2-name dis-block s-text3 p-b-5">
										<?= $product->product_name ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										<?=$product->price?>
									</span>
								</div>
							</div>
						</div>
						<?php endforeach; ?>

						
					</div>

					<!-- Pagination -->
					<div id="pagination" class="pagination flex-m flex-w p-t-26">
					<?php
						$number_of_products = getPaginationCount();

						for($i=0; $i<$number_of_products; $i++):
					?>
						<a href="#" class="item-pagination flex-c-m trans-0-4 pag" data-limit="<?=$i ?>"><?=$i+1?></a>

						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</section>