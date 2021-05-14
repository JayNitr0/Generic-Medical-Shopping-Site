<!DOCTYPE html>
<?php
session_start();
require_once('generic_fns.php');
?>
<html>

<head>
    <title>Admin</title>
    <style>
        #loginLabel {
            font-family: arial;
        }
        
        #admincommands {
            max-width: 700px;
            padding-top: 40px;
            padding-left: 15px;
            padding-right: 15px;
            text-align: center;
            margin: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        
        #loginBtn:hover {
            font-family: arial;
        }
    </style>
</head>
		<?php
		
		$ItemNumber=$_POST['editproduct'];
		$ItemName=$_POST['ItemName'];
		$ItemDesc=$_POST['Description'];
		$ItemQuan=$_POST['Quantity'];
		$ItemPrice=$_POST['Price'];
		
		$dsn = 'mysql:host=localhost;dbname=medical_database';
		$username = 'root';
		$password = '';
		try{
			$db = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e) {
			echo "Connection failed: ". $e->getMessage();
		}        

		if(!empty($ItemName)){
			$query = "UPDATE products SET name = '".$ItemName."' WHERE product_id = ".$ItemNumber;
			$statement = $db->prepare($query);
			$statement->execute();
		}

		if(!empty($ItemDesc)){
			$query = "UPDATE products SET description = '".$ItemDesc."' WHERE product_id = ".$ItemNumber;
			$statement = $db->prepare($query);
			$statement->execute();
		}

		if(!empty($ItemQuan)){
			$query = "UPDATE products SET quantity = ".$ItemQuan." WHERE product_id = ".$ItemNumber;
			$statement = $db->prepare($query);
			$statement->execute();
		}
		
		if(!empty($ItemPrice)){
			$query = "UPDATE products SET price = ".$ItemPrice." WHERE product_id = ".$ItemNumber;
			$statement = $db->prepare($query);
			$statement->execute();
		}
		
		?><h3 align="Center"><?php echo "All updates performed succcessfully."; ?></h3>

		<br>
		<form action="admin_page.php" method="post" align="Center">
            <input align="Center" type="submit" name="Return" value="Return">
        </form>

	<?php
	?>
</html>