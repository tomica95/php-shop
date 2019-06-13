<?php 
					include "models/author/author_functions.php";

					$about = author();
					
				?>
<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="<?=$about->img?>" alt="<?=$about->alt?>">
					</div>
				</div>
				

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						<?=$about->name ?>
					</h3>

					<p class="p-b-28">
						<?=$about->description ?>
					</p>


					<form method="POST" action="models/author/exportToWord.php" >

						<input type="submit" value="Export about to word">
					
					</form>

					
				</div>
			</div>
		</div>
	</section>