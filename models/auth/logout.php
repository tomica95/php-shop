<?php 

    session_start();

    require_once "../../config/connection.php";

    if(isset($_SESSION['user'])){

        global $conn;

        $query = $conn->prepare("UPDATE users SET logged=:log WHERE id=:id");

        $query->execute([
            'log'=>'0',
            'id'=>$_SESSION['user']->id
        ]);

        unset($_SESSION['user']);

    }

    header('Location:../../index.php');

?>