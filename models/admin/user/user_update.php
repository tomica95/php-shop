<?php 

header("Content-Type:application/json");

include "../../../config/connection.php";

global $conn;

try{

$id = $_POST['id'];

$query = $conn->prepare("SELECT * FROM users WHERE id= ?");

$query->execute([
    $id
]);

$user = $query->fetch();

$roles = executeQuery("SELECT * FROM roles");

$data['user'] = $user;

$data['roles'] = $roles;

echo json_encode($data);

}
catch(Exception $e){
         
    handle($e->getMessage());
}

?>