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
    <div class="title">
        <h1><?php echo $header;?></h1>
        <p><?php echo $description;?></p>
        <div class="navigator">
            <a class="active" href="#home">Home</a>
            <a href="#cart" style="float:right;">Cart</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </div>
    </div> 
  
  <?php
  if(isset(($_SESSION['username']))){?>
  <form method="post" >
            <input style="width: 100%;" type="submit" name="log_out" value = "Log Out"/>
        </form>
  <?php }?>

  <hr />
    <?php
    if(isset($_POST['log_out'])) {
        session_destroy();
        header("Location: login_page.html");
     }
    do_admin_section();
}

function do_admin_section(){
    if(isset(($_SESSION['type']))){
        if($_SESSION['type'] == "Owner" || $_SESSION['type'] == 'Manager' ||$_SESSION['type'] == 'Employee'){
            echo '<div style = "border:1px solid black; padding: 5px;">';
            echo '<h1>Admin Section</h1>';
            echo '<form method="post" action="check_receipts.php">
            <input style="width: 100%;" type="submit" name="check_all_orders" value = "Check All Orders"/></form>';  
            
            if($_SESSION['type'] == "Owner" || $_SESSION['type'] == 'Manager'){
                echo '<a href="insert.html" style="padding: 5px;">
                <button type="submit">Insert Product</button>
                </a>';
                
                if($_SESSION['type'] == "Owner"){
                    echo '<a href="delete_product.html" style="padding: 5px;">
                    <button type="submit">Delete Product</button>
                    </a></div>'; 
                }
            }
        }
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