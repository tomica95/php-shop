<?php 

    if(isset($_POST['insert-product']))
    {
        require_once "../../../config/connection.php";
        require_once "product_functions.php";

        $name = $_POST['product-name'];

        $price = $_POST['price'];

        $description = $_POST['description'];

        $category_id = $_POST['category_id'];

        $date = date("Y-m-d H:i:s");

        try{

        $isInserted = insertProduct($name,$price,$description,$category_id,$date);

            if($isInserted)
            {
                header("Location:../../../index.php?page=adminpanel");
            }
        }
            catch(PDOException $e){
        
        handle($e->getMessage());
            }
        

    }



?>