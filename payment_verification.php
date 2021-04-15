<?php
    session_start();
    require_once('generic_fns.php');
    $db = db_connect();

    $card_type=$_POST['username'];  
    $card_number=$_POST['card_number']; 
    $exp_date=$_POST['exp_date']; 
    $cvv=$_POST['cvv']; 
    $billing_address=$_POST['billing_address']; 
    $cardholder_first=$_POST['cardholder_first']; 
    $cardholder_last=$_POST['cardholder_last'];
    $user_id = $_POST['user_id'];
    
    if (!$card_type || !$card_number || 
    !$exp_date || !$cvv || 
    !$cardholder_first || !$cardholder_last) {     
        echo 'You have not entered all credentials.';     
    exit;  
} 
    $card_type=stripslashes($card_type);  
    $card_number=stripslashes($card_number); 
    $exp_date=stripslashes($exp_date); 
    $cvv=stripslashes($cvv); 
    $billing_address=stripslashes($billing_address); 
    $cardholder_first=stripslashes($cardholder_first); 
    $cardholder_last=stripslashes($cardholder_last); 
    
    function createUserPayment($card_type, $card_number, 
    $exp_date, $cvv, $billing_address, $cardholder_first, $billing_address, 
    $cardholder_first, $cardholder_last, $user_id){
        $query = "insert into payment values ('".$card_type."', '".$card_number."', 
        '".$exp_date."', '".$cvv."',
        '".$billing_address."','".$cardholder_first."',
        '".$cardholder_last."','".$user_id."')";
    }
    
    function updateUserPayment(){
        if (!$product_name || !$product_description || !$quantity || !$price || !$data) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }
    }

    function deleteUserPayment(){
        
    }
    
?>