
<?php

    require_once('generic_fns.php');
    session_start();
    
    $db = db_connect(); 
    card_credentials_page();
    // show_saved_cards($db);
    do_html_footer();

?>