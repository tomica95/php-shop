<?php 

function handle($error){
    $file = fopen(BASE_URL . "data/errors.txt", "a");

    $string = date("d.m.Y H:i:s") ."\t" . $error . "\n";

    fwrite($file, $string);
    fclose($file);
}

