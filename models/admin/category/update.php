<?php 

include "../../../config/connection.php";

include "../../../config/errorHandler.php";

global $conn;


if(isset($_POST['id'])){

    $name = $_POST['name'];

    $id = $_POST['id'];

    try
    {
        $query = $conn->prepare("UPDATE categories SET category_name=:name WHERE id=:id");

        $query->execute([
            'name'=>$name,
            'id'=>$id
        ]);

    }
    catch(Exception $e)
    {
        handle($e->getMessage());
    }

    header('Location:../../../index.php?page=adminpanel');
}