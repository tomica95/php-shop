<?php
    session_start();

    // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
         // Load Composer's autoloader
        
    require_once "../../config/connection.php";
    require_once "functions.php";

    require '../../vendor/autoload.php';




    if(isset($_POST['login-submit']))
    {

        $email = $_POST['username'];

        $password = $_POST['password'];

        $user = findUser($email,$password);

        if($user)
        {
            
            $_SESSION['user'] = $user;

            global $conn;

            $query = $conn->prepare("UPDATE users SET logged=:log WHERE id=:id");

            $query->execute([
                'log'=>'1',
                'id'=>$_SESSION['user']->id
            ]);

            header('Location:../../index.php');
        }
        else
        {

            echo "not successfull";
            
            // $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            // try {
            //     //Server settings
            //     $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            //     $mail->isSMTP();                                      // Set mailer to use SMTP
            //     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
            //     $mail->Username = 'sajtzaphp1@gmail.com';                 // SMTP username
            //     $mail->Password = 'sajtzaphp1!';                           // SMTP password
            //     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            //     $mail->Port = 587;                                    // TCP port to connect to
            //     $mail->SMTPOptions =array(
            //         "ssl"=>array(
            //             "verify_peer"=>false,
            //             "verify_peer_name"=>false,
            //             "allow_self_signed"=>true
            //         )
            //     );
            //     //Recipients
            //     $mail->setFrom('sajtzaphp1@gmail.com', 'Login not successfull');
            //     $mail->addAddress('toma.selea.103.14@ict.edu.rs','Toma Selea');     // Add a recipient
               
               
                
            //     //Content
            //     $mail->isHTML(true);                                  // Set email format to HTML
            //     $mail->Subject = 'You log-in request was not successfull';
            //     $mail->Body    = 'Please try again. Ip adress of user:' .$_SERVER['REMOTE_ADDR'];
            //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            //     $mail->send();
            //     echo 'Message has been sent';

            //     header("Location:../../index.php");
            // } 
            // catch (Exception $e) 
            // {
            //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            // }

    
        }

    }




    

?>