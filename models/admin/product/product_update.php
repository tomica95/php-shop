<?php

    
    header("Content-Type:application/json");

    include "../../../config/connection.php";

    include "../../../config/errorHandler.php";



    global $conn;

    try{

        $id = $_POST['id'];
        
        $query = $conn->prepare("SELECT *,p.id as id FROM products p INNER JOIN pictures i ON p.id=i.product_id WHERE p.id=?");
        
        $query->execute([
            $id
        ]);
        
        $product = $query->fetch();

        $categories = $conn->prepare("SELECT * FROM categories");

        $categories->execute([]);

        $cat = $categories->fetchAll();

        echo json_encode([
            "product"=>$product,
            "categories"=>$cat
        ]);

    }
    catch(Exception $e)
    {
        handle($e->getMessage());
    }
    

?>