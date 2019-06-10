<?php

    
    header("Content-Type:application/json");

    include "../../../config/connection.php";

    global $conn;

    try{

        $id = $_POST['id'];
        
        $query = $conn->prepare("SELECT * FROM categories WHERE id= ?");
        
        $query->execute([
            $id
        ]);
        
        $category = $query->fetch();

        echo json_encode($category);

    }
    catch(Exception $e)
    {
        handle($e->getMessage());
    }
    

?>