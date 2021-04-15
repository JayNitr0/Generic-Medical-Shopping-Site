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
    
    $query = "SELECT user_permission FROM user WHERE user_email_address = '".$username."' and user_password = '".$password."'";
	$result = $db->prepare($query);
	$result->execute();
	$result->store_result();
	
    if (!$result->num_rows === 0) {
        throw new Exception('Could not execute query');
    }
    
	$result->bind_result($permission);
	$result->fetch();
	
    if($permission == "Privledged"){
        
        $_SESSION["logged"] = true;
        $_SESSION["username"] = $username;
		$_SESSION["permission"] = "Privledged";

        header("Location: admin_page.php");

    }
    else {
        echo "You are not a verified user.";

    }
    
    $result->free();    
    $db->close();

?>