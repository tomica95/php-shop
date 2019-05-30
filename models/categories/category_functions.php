<?php 

    function allCategories(){

        return executeQuery("SELECT * FROM categories");
    }


?>