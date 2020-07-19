<?php
require '../db/DB.php';
$id = $_GET['id'];

//update profile
if (isset($_POST['update_user'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $id_number = $_POST["id_number"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $department = $_POST["department"];
    $district = $_POST["district"];
    $branch = $_POST["branch"];
    $cell = $_POST["cell"];
    $province_id =  $_POST["province_id"];


    try{
        $query = "UPDATE people set
            firstname='$firstname',
            lastname='$lastname',
            id_no='$id_number',
            DOB='$date_of_birth',
            gender='$gender',
            department='$department',
            district='$district',
            branch='$branch',
            cell='$cell',
            province_id='$province_id'
            where id=$id";
        $statement = $db->prepare($query);
        $statement->execute();
        header("Location:../users.php");
    }catch(Exception $ex) {
        die($ex->getMessage());
    }
    
}
?>