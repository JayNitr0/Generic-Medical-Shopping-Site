<?php
function do_html_header($title, $header, $description) {
    ?>
    <html>
    <head>
    <title><?php echo $title;?></title>
    <link href="StyleSheet.css" rel="stylesheet"/>
    <style>
        /* Add a black background color to the top navigation */

.navigator {
    background-color: rgb(0, 0, 0);
    overflow: hidden;
}


/* Style the links inside the navigation bar */

.navigator a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}


/* Change the color of links on hover */

.navigator a:hover {
    background-color: #ddd;
    color: black;
}


/* Add a color to the active/current link */

.navigator a.active {
    background-color: #4CAF50;
    color: white;
}

    </style>
  </head>
  <body>
      
  </body>
        </div>
    </div> 
  
  <?php
  if(isset(($_SESSION['username']))){?>
  
  <form action="search.php" method="post">
  <div style="text-align:center; padding:5px; width: 100%; " id="addCardBtn">
				<input type="submit" formaction="search.php" name="search" value="Search">

			</div>
      </form>
  <form method="post" >
            <input style="width: 100%;" type="submit" name="log_out" value = "Log Out"/>
        </form>
  <?php }?>
    <?php
    if(isset($_POST['log_out'])) {
        session_destroy();
        header("Location: login_page.html");
     }
}

function do_html_footer(){
  
  // print an HTML footer
  ?>
  
  </body>
  </html>
<?php 
}

function side_cart(){
?>
<header>
   <!-- logo and menu here -->
   <div id="cd-cart-trigger"><a class="cd-img-replace" href="#0">Cart</a></div>
</header>

<main>
   <!-- content here -->
</main>

<div id="cd-shadow-layer"></div>

<div id="cd-cart">
   <h2>Cart</h2>
   <ul class="cd-cart-items">
 </div>
 
 <?php
}
 function purchase_product() {
 
		if(ISSET($addToCart)) {
			echo "You must press the Add to Cart button in order to place your order.";
		
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

   <div class="cd-cart-total">
      <p>Total<span>$39.96</span></p>
   </div> <!-- cd-cart-total -->

   <a href="#0" class="checkout-btn">Checkout</a>

   <p class="cd-go-to-cart"><a href="#0">Go to cart page</a></p>
</div> <!-- cd-cart -->
<?php
 }

 function card_credentials_page() {
   ?>

  <form class="credit-card">
  <div class="form-header">
    <h4 class="title">Credit card detail</h4>
  </div>

  <div class="form-body">
    <!-- Card Number -->
    <input type="text" class="card-number" placeholder="Card Number">

    <!-- Date Field -->
    <div class="date-field">
      <div class="month">
        <select name="Month">
          <option value="january">January</option>
          <option value="february">February</option>
          <option value="march">March</option>
          <option value="april">April</option>
          <option value="may">May</option>
          <option value="june">June</option>
          <option value="july">July</option>
          <option value="august">August</option>
          <option value="september">September</option>
          <option value="october">October</option>
          <option value="november">November</option>
          <option value="december">December</option>
        </select>
      </div>
      <div class="year">
        <select name="Year">
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
        </select>
      </div>
    </div>

    <!-- Card Verification Field -->
    <div class="card-verification">
      <div class="cvv-input">
        <input type="text" placeholder="CVV">
      </div>
      <div class="cvv-details">
        <p>3 or 4 digits usually found <br> on the signature strip</p>
      </div>
    </div>

    <!-- Buttons -->
    <form action="payment_verification.php" method="post">
    <button type="submit" class="proceed-btn"><a href="#">Proceed</a></button>
    <button type="submit" class="paypal-btn"><a href="#">Pay With</a></button>
  </div>
  </form>
 <?php
 }


 ?>