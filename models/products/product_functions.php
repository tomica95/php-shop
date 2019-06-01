<?php 



    function getAllProductsWithPicture(){

        return executeQuery("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id ");

    }

    function getNewProducts(){

        return executeQuery("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id ORDER BY date DESC LIMIT 4 ");
    }

    function singleProduct($id){

        global $conn;

        $product = $conn->prepare("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id INNER JOIN categories c ON p.category_id=c.id WHERE product_id= ?");

        $product->execute([
            $id
        ]);

        return $product->fetch();
        

    }


?>