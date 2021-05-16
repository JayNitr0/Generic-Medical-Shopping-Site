<?php
function do_html_header($title, $header, $description) {
    ?>
    <html>
    <head>
    <title><?php echo $title;?></title>
    <link href="StyleSheet.css" rel="stylesheet"/>
            <style>
        body {
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
          overflow: hidden;
          background-color: #000;
        }

        .topnav a {
          float: left;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }

        .topnav a:hover {
          background-color: #ddd;
          color: black;
        }

        .topnav a.active {
          background-color: #04AA6D;
          color: white;
        }
        
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
  <div class="title">
        <h1><?php echo $header;?></h1>
        <p><?php echo $description;?></p>
        </div>
    </div> 
      
  </body>
        </div>
    </div> 

    
<div class="topnav">
  <a class="active" href="main_page.php">Home</a>
  <a href="cart_index.php">Order</a>
  <a href="add_card.php">Add Card</a>
  <?php 
  $priv = strcmp($_SESSION['permission'], 'privileged');
  if($priv == 0){ 
    ?>
  <a href="admin_page.php">Admin</a>
  <?php } ?>
</div>
<?php 
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

  <form class="credit-card" action="payment_verification.php" method="post">
    <div class="form-header">
      <h4 class="title">Credit card detail</h4>
    </div>

    <div class="form-body">
      <!-- Card Number -->
      <input name="card_number" type="text" class="credit-card" placeholder="Card Number" maxlength = 19>

      <!-- Date Field -->
      <div class="date-field">
        <div class="credit-card">
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
        <div class="credit-card">
          <select name="Year">
            <option value="2016">2021</option>
            <option value="2017">2022</option>
            <option value="2018">2023</option>
            <option value="2019">2024</option>
            <option value="2020">2025</option>
            <option value="2021">2026</option>
            <option value="2022">2027</option>
            <option value="2023">2028</option>
            <option value="2024">2029</option>
            <option value="2025">2030</option>
            <option value="2026">2031</option>
          </select>
          </select>
        </div>
      </div>

      <!-- Card Verification Field -->
      <div class="credit-card">
        <div class="credit-card">
          <input name="CVV" type="text" placeholder="CVV" maxlength = 4>
        </div>
        <div class="credit-card">
          <p>3 or 4 digits usually found <br> on the signature strip</p>
        </div>
      </div>

      <!-- Buttons -->
      <button type="submit" class= "credit-card">Proceed</a></button>
    </div>
  </form>
 <?php
 }


 ?>