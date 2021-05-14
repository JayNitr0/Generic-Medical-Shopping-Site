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
		
		$dsn = 'mysql:host=localhost;dbname=medical_database';
		$username = 'root';
		$password = '';
		try{
			$db = new PDO($dsn, $username, $password);
		}
		catch(PDOException $e) {
			echo "Connection failed: ". $e->getMessage();
		}        
		
		$query = "SELECT * FROM products";
		
		$statement = $db->prepare($query);
		$statement->execute();
		$products = $statement->fetchAll();
		$num_results = 0;
		?>
		<table width="45%" align = "center">
			<tr align="center">
				<td width="5%"><b>Item Number</b></td>
				<td width="10%"><b>Item Name</b></td>
				<td width="10%"><b>Description</b></td>
				<td width="5%"><b>Quantity</b></td>
				<td width="5%"><b>Price</b></td>
				<td width="5%"><b>Image</b></td>
				<td width="5%"><b>Edit Product</b></td>
			</tr>
		<?php
		foreach ($products as $product) :
			$num_results++;?>
			<form action="edit_product.php" method="post">
				<tr align="center">
					<td><?php echo $num_results; ?></td>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['description']; ?></td>
					<td><?php echo $product['quantity']; ?></td>
					<td><?php echo "$".$product['price']; ?></td>
					<td><?php echo '<img src="data:image/jpg;base64,'.base64_encode( $product['img'] ).'" style="max-width:100px"/>'; ?></td>
					<td><input type="submit" name="editproduct" value=" <?php echo $num_results; ?>"></td>
				</tr>
			</form>
		
		<?php
		endforeach;
		
        ?>

</html>