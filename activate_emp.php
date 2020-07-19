<?php
require "db/DB.php"; 
$id = $_GET['id'];

$query ="SELECT * FROM employees where id=$id";
$statement = $db->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();

if($count>0){
    $status=$result[0]['is_active'];
    if($status==1){
        $query ="UPDATE employees set is_active=0 where id=$id";
        $statement = $db->prepare($query);
        $statement->execute();
    }else{
        $query ="UPDATE employees set is_active=1 where id=$id";
        $statement = $db->prepare($query);
        $statement->execute();
    }
    
    if($statement){
        header("Location:emp.php");
    }
}else{
    die('user not found !');
}
?>