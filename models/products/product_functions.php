<?php 

   

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

    define("PRODUCT_ONPAGE",3);

    function getProductsWithPicture($limit=0)
    {
        try{
        global $conn;
        
        $select = $conn->prepare("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id LIMIT :limit, :offset");

        $limit = ((int) $limit)* PRODUCT_ONPAGE;

        $select->bindParam(":limit",$limit,PDO::PARAM_INT);

        $number = PRODUCT_ONPAGE;

        $select->bindParam(":offset",$number,PDO::PARAM_INT);

        $select->execute();

        $products = $select->fetchAll();

        return $products;
        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }


    }

    function getNumOfProducts()
    {
        try{
        return executeQueryOneRow("SELECT COUNT(*) AS num FROM products");
        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }

    function getPaginationCount()
    {
        try{
        $number = getNumOfProducts();

        $numberOfProducts = $number->num;

        return ceil($numberOfProducts /  PRODUCT_ONPAGE);

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }


?>