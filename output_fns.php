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
        </div>
    </div> 
      
  </body>
        </div>
    </div> 
  <form method = "post" action ="cart_index.php">
  <input style="width:100%;"  type = "submit" name = "go_to_cart" value ="order page"/></form>
  <form method = "post" action ="add_card.php">
  <input style="width:100%;"  type = "submit" name = "go_to_add_card" value ="Add Credit Card"/></form>
  <?php
  $priv = strcmp($_SESSION['permission'], 'privileged');
  if($priv == 0){
    ?>
    <form method="post">
    <div style="text-align:center; padding:5px;" id="adminBtn">
				<input style="width: 100%;" type="submit" formaction="admin_page.php" name="admin" value="Admin">
			</div>
        </form>
        <?php
  }

  if(isset(($_SESSION['username']))){?>
  <form method="post" >
            <input style="width: 100%;" type="submit" name="log_out" value = "Log Out"/>
        </form>
  <?php }
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




 function card_credentials_page() {
  $title = "Generic Medical Website";
  $header = "Generic Medical Website Card Information";
  $description = "Add Credit Card to account";
  do_html_header($title, $header, $description)
    
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
    <!-- <button type="submit" class="proceed-btn"><a href="#">Proceed</a></button>
    <button type="submit" class="paypal-btn"><a href="#">Pay With</a></button> -->
  </div>
  </form>
 <?php
 }


 ?>