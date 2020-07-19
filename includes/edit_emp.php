<?php
require '../db/DB.php';
$id = $_GET['id'];

//update profile
if (isset($_POST['update_user'])) {
    $firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$gender = $_POST["gender"];
	$role = $_POST["role"];


    try{
        $query = "UPDATE employees set
            fname='$firstname',
            lname='$lastname',
            gender='$gender',
            email='$email',
            role='$role'
            where id=$id";
        $statement = $db->prepare($query);
        $statement->execute();
        header("Location:../emp.php");
    }catch(Exception $ex) {
        die($ex->getMessage());
    }
    
}
?>