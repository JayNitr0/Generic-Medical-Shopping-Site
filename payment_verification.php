<?php

    session_start();
    require_once('generic_fns.php');
    $db = db_connect();
    $title = "Generic Medical Website";
    $header = "Generic Medical Card Page";
    $description = "Card details";
    do_html_header($title, $header, $description);

    $username=$_SESSION['username'];  
    $card_number=$_POST['card_number']; 
    $exp_date_month=$_POST['Month']; 
    $exp_date_year=$_POST['Year'];
    $cvv=$_POST['CVV'];
    
    if (!$card_number || 
    !$exp_date_month || !$exp_date_year || !$cvv) {     
        echo 'You have not entered all credentials.';     
    exit;  
} 
    if(strlen($card_number) < 13 || strlen($card_number)> 19){
        echo 'card number length is invalid.'; 
        exit;
    }
    

    $query = "SELECT user_id FROM user WHERE user_email_address = '".$username."'";
    $result = $db->query($query);
    if (!$result) {
        throw new Exception('Could not execute query');
    }
    $user_id = $result->fetch_object();
    $user_id = (int) $user_id->user_id;
    $card_number= "8675309";

    if (!get_magic_quotes_gpc()) {
        $card_number = addslashes($card_number);
        $exp_date_month = addslashes($exp_date_month);
        $exp_date_year =addslashes($exp_date_year);
        $cvv =addslashes($cvv);
        $user_id =addslashes($user_id);
    }
    $query = "insert into payment values(NULL, '".$card_number."', '".$exp_date_month."', '".$exp_date_year."','".$cvv."', '".$user_id."')";
    $result = $db->query($query);
    if ($result) {
        echo  $db->affected_rows." card inserted into database. (but as 8675309 as card number)";
    } else {
            echo "An error has occurred #2.  The item was not added.";
    }
    
    $db->close();
?>