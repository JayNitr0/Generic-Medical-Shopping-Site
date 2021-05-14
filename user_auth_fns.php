<?php
function loggedIn(){
     if($_SESSION['logged'] == false){
         header("Location: login_page.html");
     }
}

function permission(){
	if((strcmp($_SESSION['permission'], 'privileged') != 0)){
		header("Location: login_page.html");
	}
}
?>