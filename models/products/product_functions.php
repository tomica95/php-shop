<?php 

    function getAllProductsWithPicture(){

        return executeQuery("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id ");

    }

    function getNewProducts(){

        return executeQuery("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id ORDER BY date DESC LIMIT 4 ");
    }

?>