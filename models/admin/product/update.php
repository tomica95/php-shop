<?php

include "../../../config/connection.php";

include "../../../config/errorHandler.php";

global $conn;

     if(isset($_POST['update-product']))
     {
         $name = $_POST['product-name'];

         $price = $_POST['price'];

         $description = $_POST['description'];

         $category_id = $_POST['category_id'];

         $date = date("Y-m-d H:i:s");

         $id = $_POST['id'];

         
        
         try
            {
                $query = $conn->prepare("UPDATE products SET product_name=:name,price=:price,description=:desc,category_id=:cat_id,date=:date WHERE id=:id");

                $query->execute([
                    "name"=>$name,
                    "price"=>$price,
                    "desc"=>$description,
                    "cat_id"=>$category_id,
                    "date"=>$date,
                    "id"=>$id
                ]);

            }
            catch(Exception $e)
            {
                handle($e->getMessage());
            }

            header('Location:../../../index.php?page=adminpanel');


     }   



?>