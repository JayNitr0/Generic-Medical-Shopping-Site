<?php
session_start();
require_once('generic_fns.php');

  $username=$_POST['username'];
  $userage=$_POST['age'];
  $emailaddress=$_POST['email_address'];
  $confirm_emailaddress=$_POST['confirm_emailaddress'];
  $phonenumber=$_POST['phone_number'];
  $homeaddress=$_POST['home_address'];
  $password=$_POST['password'];
  $confirm_password=$_POST['confirm_password'];
  try   {
  
    //age does not pass threshold criteria 
    if ($userage >= 18 && $userage <= 100) {
      throw new Exception('please enter a valid age');
    }

    //confirms that the email input matches
    if ($emailaddress != $confirm_emailaddress) {
      throw new Exception('The email address provided does not match - please try again.');
    }

    //records home address of the client
    if (preg_match('/^\\d+ [a-zA-Z ]+, \\d+ [a-zA-Z ]+, [a-zA-Z ]+$/', $homeaddress)

    // Email Address not the same
    if ($emailaddress != $confirm_emailaddress) {
      throw new Exception('The Email address you entered do not match - please go back and try again.');
    }

    // passwords not the same
    if ($password != $confirm_password) {
      throw new Exception('The passwords you entered do not match - please go back and try again.');
    }
    //formates phonenumber of input
    if (preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $phonenumber, $matches)) {
      $phonenumber = $matches[1] . '-' .$matches[2] . '-' . $matches[3];
    }

    // check password length is ok
    // ok if username truncates, but passwords will get
    // munged if they are too long.
    if ((strlen($password) < 6) || (strlen($password) > 16)) {
      throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
    }
  }catch (Exception $e) {
     echo $e->getMessage();
     exit;
  }
  
    $query = "select username from user_type where username = '".$username."'";
    $result = $db->query($query);
    
    
    if($result){
     echo 'Username already exists';
     exit;
    }
    
    $query_insert = "insert into user_types values ('".$username."', '".$password."', 'User')";
    $result_insert = $db->query($query_insert);
    if($result_insert){
        echo "Successfully registered.";
    } else{
        echo "Query failed";
        exit;
    }
    
    
    

?>