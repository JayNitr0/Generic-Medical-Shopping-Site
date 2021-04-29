<?php

// include function files for this application
session_start();
require_once('generic_fns.php');
$db = db_connect();
$title = "Generic Medical Website";
$header = "";
$description = "";
$cost = "";
$description = "";
$addToCart = "";
do_html_header($title, $header, $description);

$query = "select * from products";
if(isset($_POST['search']) && isset($_POST['searchterm'])) {

    $searchterm = $_POST['searchterm'];
    $query = "select * from products 
    where (product_id like '%".$searchterm."%' OR 
    name like '%".$searchterm."%' OR 
    description like '%".$searchterm."%')";
}
if(isset($_POST['show_all'])) {
    $query = "select * from products";
}

$result = $db->query($query);
$num_results = $result->num_rows;
echo '<div class= "results">';
echo "<p>Number of products found: ".$num_results."</p>";
echo '<form method = "post" action ="cart.php">
        <input style="width:100%;"  type = "submit" name = "go_to_cart" value ="Cart"/></form>
        <form method="post" action="main_page.php">
        <input style="width:100%;" type="submit" name="show_all" value = "Full Catalog"/></form>';
echo '</div>';
echo '<div class= "results">';
echo "<form method='post' action='main_page.php'>
                <input type='text' name='searchterm' />
                <input type='submit' name='search' value = 'search'/>
            </form>";
echo '</div>';
echo '<div class= "outer_table_style"><div class= "table_style">';
echo '<p>';
echo '<table style="">';
$count = 0;
for ($i=0; $i <($num_results/3); $i++) {
    echo '<tr>';
    for($j=0; $j <3; $j++){
        $count++;
        if($count > $num_results){
            break;
        }
        $row = $result->fetch_assoc();
            
        echo '<td><div class="card">';
        echo '<p><strong>Product Number: ';
        echo htmlspecialchars(stripslashes($row["product_id"]));
        echo '<br/>Name: ';
        echo htmlspecialchars(stripslashes($row["name"]));
        echo '</strong><br/>';
        ini_set('memory_limit', '-1');
        echo '<img src="data:image/jpg;base64,'.base64_encode( $row['img'] ).'"/>';
        echo '<br/>Price: $';
        echo htmlspecialchars(stripslashes($row["price"]));
        echo '<br/>In Stock: ';
        echo htmlspecialchars(stripslashes($row["quantity"]));
        echo '<br/></p>';
        echo '<form action="product_page.php" method="post">';
        echo '<input type = "hidden" name = "product_id" value = "'.htmlspecialchars(stripslashes($row["product_id"])).'" />';
        echo '<p><button type="submit">See Product</button></p></form></div></td>';
        
    }
    echo '</tr>';
}
echo'</table></p></div></div>';
$db->close();
do_html_footer();
?> 