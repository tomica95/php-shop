<?php

    

    function getAllUsers(){
        try{
            
            return executeQuery("SELECT * FROM users");
        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }

    function findUser($username,$password){

        global $conn;

        try{

            $result = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");

            $result->execute([$username,md5($password)]);

            return $result->fetch();

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }

    }

    function registerUser($username,$password)
    {
        global $conn;

        try{

            $register = $conn->prepare("INSERT INTO users VALUES('',?,?,?)");

            $inserted = $register->execute([$username,md5($password),"2"]);

            return $inserted;

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }

    }


    ?>