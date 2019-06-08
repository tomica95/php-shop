<?php

    function allUsers(){

        try{

        return executeQuery("SELECT * , u.id AS id FROM users u INNER JOIN roles r ON u.role_id=r.id");
        }
        catch(Exception $e){
         
            handle($e->getMessage());
        }
    }

    




?>