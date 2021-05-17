
<?php

    session_start();
    require_once('generic_fns.php');
    
    $db = db_connect(); 
    card_credentials_page();
    // show_saved_cards($db);
    do_html_footer();

?>