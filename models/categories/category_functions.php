<?php 

    function allCategories(){

        try{

        return executeQuery("SELECT * FROM categories");

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }


?>