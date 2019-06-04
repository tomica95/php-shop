<?php

    header("Content-Type:application/json");

    if(isset($_POST['sort'])){
        
        $dataSort = $_POST['sort'];

        include "../../config/connection.php";

        include "product_functions.php";

        $query = sortQuery();

        switch($dataSort){

            case "default":
            $query;
            break;

            case "name-asc":
            $query .="ORDER BY product_name ASC";
            break;

            case "name-desc":
            $query .="ORDER BY product_name DESC";
            break;

            case "price-l-h":
            $query .="ORDER BY price ASC";
            break;

            case "price-h-l":
            $query .="ORDER BY price DESC";
            break;
        }

        $result = executeQuery($query);

        echo json_encode($result);

    }
    else
    {
        http_response_code(400); // Bad request
        echo json_encode(["error"=> "You haven't checked sort"]);
    }


?>