<?php 

include "../../../config/connection.php";

global $conn;

$username = $_POST['username'];

$password = $_POST['password'];

$role_id = $_POST['role_id'];

$id = $_POST['id'];

try{
$query = $conn->prepare("UPDATE users SET username=:user,password=:pass,role_id=:role_id WHERE id=:id");

$query->execute([
    'user'=>$username,
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