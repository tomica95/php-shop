<?php

    header("Content-Type: application/json");

    

    if(isset($_GET['limit']))
    {
        require_once "../../config/connection.php";

        include "product_functions.php";

        $limit = $_GET['limit'];

        $products = getProductsWithPicture($limit);

        $num_of_products = getPaginationCount();

        echo json_encode([
            "products"=>$products,
            "pagination"=>$num_of_products
        ]);



        
    }
    else 
    {
        echo json_encode(["message"=> "Limit not passed."]);
        http_response_code(400); // Bad request
    }


?>