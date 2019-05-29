<?php
    require_once "../../config/connection.php";
    require_once "functions.php";




    if(isset($_POST['login-submit'])){

        $username = $_POST['username'];

        $password = $_POST['password'];

        $user = findUser($username,$password);

        if($user)
        {
            echo "ulogovan je";
            header('Location:../../index.php');
        }
        else
        {
            echo "pokusajte ponovo";
        }
    
        
    }

    





    


?>