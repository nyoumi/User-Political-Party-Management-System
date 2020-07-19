<?php
require "db/DB.php"; 
$id = $_GET['id'];

$query ="SELECT * FROM people where id=$id";
$statement = $db->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();

if($count>0){
    $query ="DELETE FROM people where id=$id";
    $statement = $db->prepare($query);
    $statement->execute();
    if($statement){
        header('Location:users.php');
    }
}else{
    die('user not found !');
}
?>