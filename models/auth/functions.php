<?php

    function getAllUsers(){

        return executeQuery("SELECT * FROM users");
    }

    // function findUser($username,$password){

    //     global $conn;

    //     $query = $conn->prepare("SELECT * FROM users WHERE username= ? AND password= ?");

    //     $find = $query->execute([$username,md5($password)]);

    //     $user = $find->fetch();

    //     echo $user;

        
    // }

    ?>