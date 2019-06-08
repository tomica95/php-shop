<?php 

    


    function getAllProductsWithPicture(){

        try{

        return executeQuery("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id ");
        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }

    function getNewProducts(){

        try {

            return executeQuery("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id ORDER BY date DESC LIMIT 4 ");

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }

    function singleProduct($id){

        global $conn;

        try{

            $product = $conn->prepare("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id INNER JOIN categories c ON p.category_id=c.id WHERE product_id= ?");

            $product->execute([
                $id
            ]);

            return $product->fetch();

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
        

    }

    function sortQuery(){

        try{

            return "SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id ";

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }


?>