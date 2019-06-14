<?php 

    require_once "../../../config/connection.php";
    global $conn;

    if(isset($_POST['id']))
    {
        try{

        $delete_product = $conn->prepare("DELETE FROM products WHERE id=?");

        $delete = $delete_product->execute([
            $_POST['id']
        ]);
        }
        catch(PDOException $e){
        
            handle($e->getMessage());
        }
        if($delete)
        {
            try{
            $delete_image_of_product = $conn->prepare("DELETE FROM pictures WHERE product_id=?");

            $delete_image = $delete_image_of_product->execute([
                $_POST['id']
            ]);
            }
            catch(PDOException $e){
        
                handle($e->getMessage());
            }
        }
        
        header("Location:../../../index.php?page=adminpanel");
    }


?>