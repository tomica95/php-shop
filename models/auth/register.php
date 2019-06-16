<?php 

require_once "../../config/connection.php";
require_once "functions.php";

    if(isset($_POST['register-submit'])){

        $email = $_REQUEST['username'];

        $regMail = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";

        $password = $_REQUEST['password'];

        $regPassword = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";

        $conf_password = $_REQUEST['confirm-password'];

        $regPassword2 = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";

        $greske = [];

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

            Header("Location:../../index.php?page=login");
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
                header("Location:../../index.php?page=login&Message=".$Message);
                die;
            }
            else
            {
                $registered = registerUser($email,$password);

                if($registered){
    
                    header("Location:../../index.php?page=login");
                }
                else
                {
                    echo "Pokusajte ponovo";
                }

            }
            

        }
        
      
        
    }

?>