<?php 

require_once "../../config/connection.php";
require_once "functions.php";

    if(isset($_POST['register-submit'])){

        $email = $_REQUEST['username'];

        $password = $_REQUEST['password'];

        $conf_password = $_REQUEST['confirm-password'];

        if($password==$conf_password)
        {
            
            $registered = registerUser($email,$password);

            if($registered){
    
                echo "uspesno registrovan";
            }
            else
            {
                echo "Pokusajte ponovo";
            }
        }
        else
        {
            echo "Vas password se ne slaze";
        }

        
    }

?>