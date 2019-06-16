 <?php

    function allUsers(){

        try{

        return executeQuery("SELECT * , u.id AS id FROM users u INNER JOIN roles r ON u.role_id=r.id");
        }
        catch(Exception $e){
         
            handle($e->getMessage());
        }
    }

    function allRoles(){

        try{

            return executeQuery("SELECT * FROM roles");
            }
            catch(Exception $e){
             
                handle($e->getMessage());
            }

    }

    function registerUser($email,$password,$role_id)
    {
        global $conn;

        try{

            $register = $conn->prepare("INSERT INTO users VALUES('',?,?,?,?)");

            $inserted = $register->execute([$email,md5($password),$role_id,"0"]);

            return $inserted;

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }

    }

    function countLoggedUsers()
    {
        global $conn;

        try
        {
            $query = $conn->prepare("SELECT COUNT(*) as numberOfLogged FROM users WHERE logged=?");

            $query->execute([
                '1'
            ]);

            return $query->fetch();
            

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }

    }

    




?>