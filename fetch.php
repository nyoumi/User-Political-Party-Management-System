<?php
require 'db/DB.php';
$column = array('id','id_no', 'firstname', 'lastname','DOB','gender','department', 'province_id', 'district', 'branch', 'cell');

$query = "SELECT id, id_no, firstname, lastname, DOB, gender, department, province_id, district, branch, cell FROM people";
$statement = $db->prepare($query);
$statement->execute();
$count = $statement->rowCount();
$result = $statement->fetchAll();

$file = fopen('files/demosaved.csv', 'w');
fputcsv($file,$column);

foreach ($result as $row){
    fputcsv($file, $row);
}

header('Location:index.php');
