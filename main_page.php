<?php

// include function files for this application
require_once('generic_fns.php');
session_start();
$title = "";
$header = "";
$description = "";
$cost = "";
$description = "";
$addToCart = "";
do_html_header($title, $header, $description);
purchase_product($cost,$description,$addToCart);

	$cost = $_POST['cost'];
	$description = $_POST['description'];
	$addToCart = $_POST['addToCart'];
 
		if(ISSET($addToCart)) {
			echo "You must press the Add to Cart button in order to place your order."
		
		}
?>
	 <li>
         	<div class = "product_card1">
				<h1></h1>
				<p id ="cost" name = "cost">$29.99</p>
				<p name = "description">Some text about the product</p>
				<p><input id = "product1" = type = "submit" value = "Add to Cart" name = "addToCart"></p>
			</div>
      </li>

      <li>
         <!-- ... -->
      </li>
   </ul> <!-- cd-cart-items -->
   ?>
   
<?php 
do_html_footer();
