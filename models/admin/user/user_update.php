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

$result = $query->fetch();

echo json_encode($result);

}
catch(Exception $e){
         
    handle($e->getMessage());
}

?>