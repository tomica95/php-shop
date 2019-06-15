<?php 

    function getAllProductsWithPictureAndCategory(){

        try{

        return executeQuery("SELECT * ,p.id AS id FROM products p LEFT OUTER JOIN pictures i ON p.id=i.product_id INNER JOIN categories c ON p.category_id=c.id ");
        }
        catch(PDOException $e){
        
            handle($e->getMessage());
        }
    }

    function insert($srcOriginalPicture, $srcNewPicture, $product_id){
        try{
        global $conn;
        $insert = $conn->prepare("INSERT INTO pictures VALUES('', ?, ?,?)");
        $isInserted = $insert->execute([$srcOriginalPicture, $srcNewPicture,$product_id]);
        return $isInserted;
        }
        catch(PDOException $e){
        
            handle($e->getMessage());
        }
    }

    function insertProduct($name,$price,$description,$category_id,$date){

        try
        {
            global $conn;

            $insert = $conn->prepare("INSERT INTO products VALUES('',?,?,?,?,?)");

            $inserted = $insert->execute([
                $name,$price,$description,$category_id,$date
            ]);

            return $inserted;
        }
        catch(PDOException $e){
        
            handle($e->getMessage());
        }
        
    }

    function getAllCategories(){

        try{

        return executeQuery("SELECT * FROM categories");
        }
        catch(PDOException $e){
        
            handle($e->getMessage());
        }

    }

?>