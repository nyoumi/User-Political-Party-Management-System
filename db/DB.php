<?php
@session_start();
//Database connection
$db = new PDO('mysql:host=localhost;dbname=zanu;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

/* user management */

//login function
function login($email, $password)
{
    global $db;
    try {
        $sql = "SELECT * FROM employees WHERE email=?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($email));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        if ($count > 0) {
            if (password_verify($password, $rslt[0]["password"])) {
                storeSessions($email);
                $result["status"] = "ok";
            } else {
                die('wrong password !');
            }
        } else {
            $result["status"] = "fail";
        }
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }
    return $result;
}
//store sessions 
function storeSessions($email)
{
    global $db;
    try {
        $sql = "SELECT * FROM employees WHERE email=?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($email));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION["id"] = $rslt[0]["id"];
            $_SESSION["fname"] = $rslt[0]["fname"];
            $_SESSION["lname"] = $rslt[0]["lname"];
            $_SESSION["email"] = $rslt[0]["email"];
            $_SESSION['role'] = $rslt[0]["role"];
        } else {
            die("fail");
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}


//function to check if the user is logged
function isLogggedIn()
{
    if (isset($_SESSION['id'])) {
        return true;
    }
}
//logout function
function logout()
{
    session_destroy();
    header("Location:login.php");
}

//Function to register a new user
function create_user($firstname,$lastname,$id_number,$department,$date_of_birth,$gender,$district,$branch,$cell,$province_id)
{
    $id = rand(10111111, 10999999);
    //$date_of_birth = date('Y-m-d');

    global $db;
    try {
        $stmt = $db->prepare("INSERT INTO people (id,firstname,lastname,id_no,department,DOB,gender,district,branch,cell,province_id) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($id,$firstname,$lastname,$id_number,$department,$date_of_birth,$gender,$district,$branch,$cell,$province_id));
        $counter = $stmt->rowCount();
        $result["status"] = "ok";
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }

    return $result;
}
function create_employee($fname,$lname,$password,$gender,$email,$is_active,$role)
{
    $id = rand(10111111, 10999999);
    $password = password_hash($password, PASSWORD_DEFAULT);

    global $db;
    try {
        $stmt = $db->prepare("INSERT INTO employees (id,fname,lname,password,gender,email,is_active,role) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->execute(array($id,$fname,$lname,$password,$gender,$email,$is_active,$role));
        $counter = $stmt->rowCount();
        $result["status"] = "ok";
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }

    return $result;
}

//function to create chart data
function chart_data(){
    global $db;
    $provinces = array(1,2,3,4,5,6,7,8,9);
    $arr = array();
    $i = 0;
    foreach ($provinces as $p) {
        $sql = "SELECT * FROM people WHERE province_id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($p));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        foreach ($rslt as $row) {
            $i++;
        }
        array_push($arr, $i);
        $i=0;

    }
    $result["status"]  = $arr;
    return $result;
}

//check for district users
function district($province_id){
    global $db;
    $district = array('dist1','dist2','dist3','dist4','dist5');
    $arr = array();
    $i = 0;
    foreach ($district as $d) {
        $sql = "SELECT * FROM people WHERE province_id=? and district=?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($province_id, $d));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        foreach ($rslt as $row) {
            $i++;
        }
        array_push($arr, $i);
        $i=0;

    }
    $result["status"]  = $arr;
    return $result;
}

//check for district users
function cell($province_id){
     global $db;
    $cell = array('cellA','cellB','cellC','cellD','cellE');
    $arr = array();
    $i = 0;
    foreach ($cell as $c) {
        $sql = "SELECT * FROM people WHERE province_id=? and cell=?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($province_id, $c));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        foreach ($rslt as $row) {
            $i++;
        }
        array_push($arr, $i);
        $i=0;

    }
    $result["status"]  = $arr;
    return $result;
}

//check for branch users
function branch($province_id){
    global $db;
    $branch = array('branch1','branch2','branch3','branch4','branch5');
    $arr = array();
    $i = 0;
    foreach ($branch as $b) {
        $sql = "SELECT * FROM people WHERE province_id=? and branch=?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($province_id, $b));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        foreach ($rslt as $row) {
            $i++;
        }
        array_push($arr, $i);
        $i=0;

    }
    $result["status"]  = $arr;
    return $result;
}

//check for category
function category($province_id){
    global $db;
    $dept = array('youth','women','men','PS','CC');
    $arr = array();
    $i = 0;
    foreach ($dept as $d) {
        $sql = "SELECT * FROM people WHERE province_id=? and department=?";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($province_id, $d));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        foreach ($rslt as $row) {
            $i++;
        }
        array_push($arr, $i);
        $i=0;

    }
    $result["status"]  = $arr;
    return $result;
}

//My User Create Account Function
function createAccount($id)
{
    global $db;
    try {
        $depo_date = date('Y-m-d H:i:s');
        $query ="INSERT INTO account(id) VALUES(".$id.")";
        $statement = $db->prepare($query);
        $statement->execute();
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }
}
//Function to check if the user already exists
function user_exist($id_no)
{
    global $db;
    try {
        $sql = "SELECT * FROM people WHERE id_no=? ";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($id_no));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $result["status"] = "ok";
        } else {
            $result["status"] = "error";
        }
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }
    return $result;
}

//Function to check if the user already exists
function employee_exist($email)
{
    global $db;
    try {
        $sql = "SELECT * FROM employees WHERE email=? ";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($email));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $result["status"] = "ok";
        } else {
            $result["status"] = "error";
        }
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }
    return $result;
}

//Function to check if the email already exists
function email_exist($email)
{
    global $db;
    try {
        $sql = "SELECT * FROM auth_user WHERE email=? ";
        $stmt = $db->prepare($sql);
        $stmt->execute(array($email));
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $result["status"] = "ok";
        } else {
            $result["status"] = "error";
        }
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }
    return $result;
}
/* End of user management */

//update user information
function updateProfile($db_field, $variable, $email)
{
    global $db;
    try {
        $stmt = $db->prepare("update auth_user set " . $db_field . "=? where email=?");
        $stmt->execute(array($variable, $email));
        $counter = $stmt->rowCount();
        if ($counter > 0) {
            $result["status"] = "ok";
            $result["id"] = $db->lastInsertId();
        } else {
            $result["status"] = "error";
        }
    } catch (Exception $ex) {
        $result["status"] = $ex->getMessage();
    }
    return $result;
}

