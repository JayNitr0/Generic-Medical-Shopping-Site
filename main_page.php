<?php

// include function files for this application
require_once('generic_fns.php');
session_start();
$title = "";
$header = "";
$description = "";
do_html_header($title, $header, $description);
do_html_footer();
?>
