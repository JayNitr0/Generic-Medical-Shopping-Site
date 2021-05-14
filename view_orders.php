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
		$query = "SELECT * FROM `order`";
		
		$statement = $db->prepare($query);
		$statement->execute();
		$products = $statement->fetchAll();
		$num_results = 0;
		?>
		<table width="35%" align = "center">
			<tr align="center">
				<td width="5%"><b>Line Total</b></td>
				<td width="20%"><b>Shipping Address</b></td>
				<td width="5%"><b>Payment Method</b></td>
				<td width="5%"><b>Status</b></td>
			</tr>
			<?php
			foreach ($products as $product) :
				$num_results++; ?>
				<tr align="center">
					<td><?php echo $product['line_total']; ?></td>
					<td><?php echo $product['shipping_address_id']; ?></td>
					<td><?php echo $product['payment_method (foreign key)']; ?></td>
					<td><?php echo $product['Status (processing/shipped/delivered/cancelled)']; ?></td>
				</tr>
			<?php
				endforeach;
			?>
			<tr align="center">
				<td colspan=4>
					<form action="admin_page.php" method="post" align="Center">
						<input align="Center" type="submit" name="Return" value="Return">
					</form>
				</td>
			</tr>
		
		
		

</html>