<?php

    function allUsers(){

        return executeQuery("SELECT * , u.id AS id FROM users u INNER JOIN roles r ON u.role_id=r.id");
    }

    




?>