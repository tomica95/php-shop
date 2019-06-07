<?php

    function allUsers(){

        return executeQuery("SELECT * FROM users u INNER JOIN roles r ON u.role_id=r.id");
    }

    




?>