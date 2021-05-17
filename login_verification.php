<?php
session_start();
require_once('generic_fns.php');
$db = db_connect();


    $username=$_POST['username'];  
    $password=$_POST['password'];
    
    if (!$username || !$password) {     
        echo 'You have not entered credentials.';     
    exit;  
} 
    
    //protect sql injections
    $username  = stripslashes($username);    
    $password = stripslashes($password);
    
    //$password = md5($password);
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT user_permission, user_password FROM user WHERE user_email_address = '".$username."'";
    $result = $db->query($query);
    if (!$result) {
        throw new Exception('Could not execute query');
    }


    $row = $result->num_rows;
    $permission = $result->fetch_object();
    $password_success = $permission->user_password;
    $verify = password_verify($password, $password_success);
    if($row == 1 && $verify){
        $_SESSION['permission'] = $permission->user_permission;
        $_SESSION["logged"] = true;
        $_SESSION["username"] = $username;

        header("Location: main_page.php");

    }
    else {
 
        echo "Failure to login!";

    }
    
    $result->free();    
    $db->close();

?>