<?php 

    

    function author(){

        

        global $conn;

        $author = $conn->prepare("SELECT * FROM author WHERE id=?");

        $author->execute([1]);

        $result = $author->fetch();

        return $result;

    }

    


?>