<?php 

    include "../../../config/connection.php";

    global $conn;

    $id = $_POST['id'];

    if(isset($_POST['delete'])){

        $query = $conn->prepare("DELETE FROM users WHERE id=?");

        $query->execute([

            $id

        ]);

        header("Location:../../../index.php?page=admin_panel");
    }


?>