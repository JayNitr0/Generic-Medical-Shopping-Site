<?php
function loggedIn(){
     if($_SESSION['logged'] == false){
         header("Location: login_page.html");
     }
}

function permission(){
	if($_SESSION["permission"] != "Privledged"){
		header("Location: login_page.html");
	}
}
?>