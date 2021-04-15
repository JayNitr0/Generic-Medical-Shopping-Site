<?php

// include function files for this application
require_once('generic_fns.php');
session_start();
$title = "Generic Medical Website";
$header = "";
$description = "";
$cost = "";
$description = "";
$addToCart = "";
do_html_header($title, $header, $description);
purchase_product($cost,$description,$addToCart);

		$con = new PDO("mysql:host=localhost;dbname=medical_database",'root','');

if (isset($_POST["addToCart"])) {
	$sth = $con->prepare("SELECT * FROM `product` WHERE description = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		
	}
		
		
	
		
		
		else{
			echo "Description does not exist";
		}


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
   
  <form action="add_card.php" method="post">
  <div style="text-align:center; padding:5px;" id="addCardBtn">
				<input type="submit" formaction="add_card.php" name="addCard" value="Add Card">

			</div>
      </form>

  
<?php 
do_html_footer();
?>