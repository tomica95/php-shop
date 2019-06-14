<?php 

    function getAllProductsWithPictureAndCategory(){

        try{

        return executeQuery("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id INNER JOIN categories c ON p.category_id=c.id ");
        }
        catch(PDOException $e){
        
            handle($e->getMessage());
        }
    }


?>