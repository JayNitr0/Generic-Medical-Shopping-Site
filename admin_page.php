<!DOCTYPE html>
<?php
session_start();
require_once('generic_fns.php');
//permission();
$title = "Generic Medical Website";
$header = "Admin";
$description = "Admin user controls";
do_html_header($title, $header, $description);
?>



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