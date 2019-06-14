<?php
	session_start();
	//errors
	include "config/errorHandler.php";
	
	//connection
	include "config/connection.php";
	
	//head
	include "pages/components/head.php";
	//header
	include "pages/components/header.php"; 

	//content
	if(isset($_GET['page'])){

		switch($_GET['page']){
			case 'index':
			include "pages/views/main.php";
			break;
			
			case 'about':
			include "pages/views/about.php";
			break;

			case 'shop':
			include "pages/views/products.php";
			break;

			case 'product':
			include "pages/views/single-product.php";
			break;

			case 'login':
			include "pages/views/login.php";
			break;

			case 'adminpanel':
			include "pages/views/adminpanel.php";
			break;
		}
	}
	else
	{
		include "pages/views/main.php";
	}

	//footer
	include "pages/components/footer.php";

?>

	