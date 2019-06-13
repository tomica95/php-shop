<?php 

    include "../../../config/connection.php";
    include "../../../config/errorHandler.php";

    global $conn;

    if(isset($_POST['insert']))
    {
        $cat_name = $_POST['cat_name'];

        try
        {
            $query = $conn->prepare("INSERT INTO categories VALUES ('',?)");

            $query->execute([
                $cat_name
            ]);
    
        }
        catch(Exception $e)
        {
            handle($e->getMessage());
        }
    
        header('Location:../../../index.php?page=adminpanel');
    }


?>