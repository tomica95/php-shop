<?php 

    include "../../../config/connection.php";

    include "user_functions.php";

    global $conn;

    $email = $_POST['username'];

    $password = $_POST['password'];

    $password2 = $_POST['confirm-password'];

    $role_id = $_POST['id_role'];

    if(isset($_POST['register-submit'])){

        if($password==$password2)
        {
            $newUser = registerUser($email,$password,$role_id);

            if($newUser)
            {
                header("Location:../../../index.php?page=adminpanel");
            }
        }
        else
        {
            echo "You must retype your password";
        }

    }
    else
    {
        echo "Try to hack";
    }

    

?>