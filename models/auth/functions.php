<?php

    require_once "../../config/errorHandler.php";

    function getAllUsers(){
        try{
            
            return executeQuery("SELECT * FROM users");
        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }

    function findUser($email,$password){

        global $conn;

        try{

            $result = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");

            $result->execute([$email,md5($password)]);

            return $result->fetch();

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }

    }

    function registerUser($email,$password)
    {
        global $conn;

        try{

            $register = $conn->prepare("INSERT INTO users VALUES('',?,?,?,?)");

            $inserted = $register->execute([$email,md5($password),"2","0"]);

            return $inserted;

        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }

    }


    ?>