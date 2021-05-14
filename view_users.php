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
		
		$query = "SELECT * FROM user";
		
		$statement = $db->prepare($query);
		$statement->execute();
		$products = $statement->fetchAll();
		$num_results = 0;
		
        ?>
		<table width="40%" align = "center">
			<tr align="center">
				<td width="10%"><b>First Name</b></td>
				<td width="5%"><b>Last Name</b></td>
				<td width="10%"><b>Phone Number</b></td>
				<td width="10%"><b>Email</b></td>
				<td width="5%"><b>Permissions</b></td>
			</tr>
			<?php

			foreach ($products as $product) :
				$num_results++;?>
				<tr align="center">
					<td><?php echo $product['user_first']; ?></td>
					<td><?php echo $product['user_last']; ?></td>
					<td><?php echo $product['user_phone_number']; ?></td>
					<td><?php echo $product['user_email_address']; ?></td>
					<td><?php echo $product['user_permission']; ?></td>
				</tr>
			<?php
			
			endforeach ?>
			
			<tr align="center">
				<td colspan=5>
					<form action="admin_page.php" method="post" align="Center">
						<input align="Center" type="submit" name="Return" value="Return">
					</form>
				</td>
			</tr>
		


	<?php
	?>
</html>