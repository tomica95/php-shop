<?php

    header("Content-Type: application/json");

    $limit = $_GET['limit'];

    if($limit)
    {
        require_once "../../config/connection.php";

        include "product_functions.php";

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