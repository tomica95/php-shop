<?php

    function getAllUsers(){

        return executeQuery("SELECT * FROM users");
    }

     function findUser($username,$password){

        global $conn;

        $result = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");

        $result->execute([$username,md5($password)]);

        return $result->fetch();

        
    }

    ?>