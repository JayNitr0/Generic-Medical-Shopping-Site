<!DOCTYPE html>
<?php
//session_start();
//require_once('generic_fns.php');
//permission();
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



<body>

    <div id="admincommands">
        <form action="admin_orders.php" method="post">
            <h1>Admin</h1>

            <div style="text-align:center; padding:5px;" id="UpdateProduct">
                <input type="submit" name="Updateproduct" value="View Products">
            </div>
			<div style="text-align:center; padding:5px;" id="AddProduct">
                <input type="submit" name="addproduct" value="Add Product" formaction="add_product.php">
            </div>
			<div style="text-align:center; padding:5px;" id="ViewOrders">
				<input type="submit" name="vieworders" value="View Orders" formaction="view_orders.php">
			</div>
			<div style="text-align:center;" id="ViewUsers">
                <input type="submit" name="viewusers" value="View Users" formaction="view_users.php">
            </div>		
        </form>
    </div>
</body>

</html>