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
		
		$ItemName=$_POST['editproduct'];
		
		$dsn = 'mysql:host=localhost;dbname=medical_database';
		$username = 'root';
		$password = '';
		try{
			$db = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e) {
			echo "Connection failed: ". $e->getMessage();
		}        
		
		$query = "SELECT * FROM products where product_id like ".$ItemName;
		
		$statement = $db->prepare($query);
		$statement->execute();
		$product = $statement->fetch();
		$num_results = 0;
		
        ?>
		<table width="35%" align = "center">
			<tr align="center">
				<td width="5%"><b>Item Number</b></td>
				<td width="10%"><b>Item Name</b></td>
				<td width="10%"><b>Description</b></td>
				<td width="5%"><b>Quantity</b></td>
				<td width="5%"><b>Price</b></td>
				<td width="5%"><b>Submit</b></td>
			</tr>
			<tr align="center">
				<td><?php echo $product['product_id']; ?></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['description']; ?></td>
				<td><?php echo $product['quantity']; ?></td>
				<td><?php echo "$".$product['price']; ?></td>
				<td></td>
			</tr>
			<form action="finalize_edit.php" method="post">
				<tr align="center">
					<td><?php echo $product['product_id']; ?></td>
					<td><input type="text" id="ItemName" name="ItemName" /></td>
					<td><input type="text" id="Description" name="Description" /></td>
					<td><input type="integer" id="Quantity" name="Quantity" /></td>
					<td><input type="integer" id="Price" name="Price" /></td>
					<td><input type="submit" name="editproduct" value=" <?php echo $product['product_id']; ?>"></td>
				</tr>
			</form>
		</table>


	<?php
	?>
</html>