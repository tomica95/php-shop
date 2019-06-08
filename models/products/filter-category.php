<?php 

    header("Content-Type:application/json");

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        include "../../config/connection.php";

        include "product_functions.php";

        global $conn;

        try{

            $product = $conn->prepare("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id INNER JOIN categories c ON p.category_id=c.id WHERE category_id= ?");

            $product->execute([
                $id
            ]);
    
            echo json_encode($product->fetchAll());

        }
        catch(PDOPDOException $e){

         
                handle($e->getMessage());
           


        }

        
    }
    else
    {
        http_response_code(400); // Bad request
        echo json_encode(["error"=> "You haven't checked category"]);
    }
   




?>