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
      <li>
         <!-- ... -->
      </li>

      <li>
         <!-- ... -->
      </li>
   </ul> <!-- cd-cart-items -->

   <div class="cd-cart-total">
      <p>Total <span>$39.96</span></p>
   </div> <!-- cd-cart-total -->

   <a href="#0" class="checkout-btn">Checkout</a>

   <p class="cd-go-to-cart"><a href="#0">Go to cart page</a></p>
</div> <!-- cd-cart -->
<?php
}



?>