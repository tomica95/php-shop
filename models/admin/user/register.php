<?php 

    include "../../../config/connection.php";

    include "user_functions.php";

    global $conn;

    $email = $_POST['username'];

    $regMail = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";

    $password = $_POST['password'];

    $regPassword = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";


    $conf_password = $_POST['confirm-password'];

    $regPassword2 = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";

    $role_id = $_POST['id_role'];

    if(!preg_match($regMail,$email)){


        $greske[]="Mail not good";
    }

    if(!preg_match($regPassword,$password)){
   
        $greske[]="Password not good";
    }

    if(!preg_match($regPassword2,$conf_password)){
        $greske[]="Password2 not good";
    }



    if($password!=$conf_password)
    {
        $greske[]= "Passwords not the same";    
    }

    if(count($greske)>0){


        foreach($greske as $greska){

            echo $greska."</br>";
        }

        echo "Please go back and try again";
    }
    else
    {

        $checking_if_exist = $conn->prepare("SELECT * FROM users WHERE email=?");

        $checking_if_exist->execute([
            $email
        ]);
        
        $exist = $checking_if_exist->fetch();

        if($exist)
        {
            $Message = urlencode("Your email is already in database");
            header("Location:../../index.php?page=adminpanel&Message=".$Message);
            die;
        }
        else
        {
            $registered = registerUser($email,$password,$role_id);

            if($registered){

                header("Location:../../index.php?page=adminpanel");
            }
            else
            {
                echo "Pokusajte ponovo";
            }

        }
        

    }


?>