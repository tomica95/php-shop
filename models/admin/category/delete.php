<?php 

    include "../../../config/connection.php";

    global $conn;
    if(isset($_POST['delete']))
    {

    try{

        $id = $_POST['id'];

        
            $query = $conn->prepare("DELETE FROM categories WHERE id = ?");

            $query->execute([
                $id
            ]);

            header("Location:../../../index.php?page=adminpanel");
        

    }
    catch(Exception $e)
    {
        handle($e->getMessage());
    }

    }

?>