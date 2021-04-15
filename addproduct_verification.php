<?php
session_start();
require_once('generic_fns.php');
$db = db_connect();

	$ItemName=$_POST['ItemID'];  
    $Quantity=$_POST['Quantity'];
	$Price=$_POST['ItemPrice'];
	
	/*
	if(!$ItemName || !$Quantity || !$Price){
		echo "You have not entered all information";
	}
	*/
	
	$ItemName  = stripslashes($ItemName);    
    $Quantity = stripslashes($Quantity);
	$Price = stripslashes($Price);
	
	$query = "INSERT INTO `items` (`ID (unique)`, `Quantity`, `Item_Price`) VALUES ('".$ItemName."', ".$Quantity.", ".$Price.")";
	
	if ($db->query($query) === TRUE){
		echo "New item added successfully.";
	}
	else{
		echo "There was an error adding your item.";
	}

	$db->close();
	
?>

<html>
</html>