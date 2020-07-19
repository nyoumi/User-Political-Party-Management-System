<?php
require "db/DB.php"; 
$id = $_GET['id'];

$query ="SELECT * FROM employees where id=$id";
$statement = $db->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();

if($count>0){
    die('deleted');
}else{
    die('user not found !');
}
?>