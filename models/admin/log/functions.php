<?php 

    function logFiles(){

        $file = fopen("data/log.txt","r");

        $podaci = file("data/log.txt");

        return $podaci;

    }



?>