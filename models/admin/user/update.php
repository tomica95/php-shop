<?php 

include "../../../config/connection.php";

global $conn;

$email = $_POST['username'];

$password = $_POST['password'];

$role_id = $_POST['role_id'];

$id = $_POST['id'];

try{
$query = $conn->prepare("UPDATE users SET email=:email,password=:pass,role_id=:role_id WHERE id=:id");

$query->execute([
    'email'=>$email,
    'pass'=>$password,
    'role_id'=>$role_id,
    'id'=>$id
]);

}
catch(Exception $e){
         
    handle($e->getMessage());
}

header('Location:../../../index.php?page=adminpanel');



?>