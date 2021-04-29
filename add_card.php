
<?php

    require_once('generic_fns.php');
    session_start();
    
    $db = db_connect(); 
    do_html_header("","","");
    card_credentials_page();
    // show_saved_cards($db);
    do_html_footer();

?>