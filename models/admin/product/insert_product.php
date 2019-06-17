<?php 

    function insert_product(){

        $name = $_POST['product-name'];

        $price = $_POST['price'];

        $description = $_POST['description'];

        $category_id = $_POST['category_id'];

        $date = date("Y-m-d H:i:s");

        $greske = [];

        if(empty($name)){
            $greske[]="No name";
        }
        if(is_int($price)){
            $greske[]="No price";
        }
        if(empty($description)){
            $greske[]="NO description";
        }
        if(count($greske)>0){
            foreach($greske as $error){
                echo $error."</br>";
            }
        }
        else
        {

        try{

        $isInserted = insertProduct($name,$price,$description,$category_id,$date);

            if(!$isInserted)
            {
                header("Location:../../../index.php?page=adminpanel");
            }
        }
            catch(PDOException $e){
        
        handle($e->getMessage());
            
    }
        }

    }
?>