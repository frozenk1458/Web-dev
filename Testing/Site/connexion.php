<!-- Developed by Frozenk-->

<?php
session_start();
	function getp(){
	$pageURL = 'http';
	if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
		$pageURL .= "://";
	if ($_SERVER['SERVER_PORT'] != "80") {
	$pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	if(isset($_SESSION['connected']))echo "<p>".$_SESSION['connected']."</p>";
	if(isset($_SESSION['connected'])){if($_SESSION['connected']=="OK") file_put_contents('log - '.$_GET['login'].'.txt', "Access to page ". $pageURL." : ".date('l jS \of F Y h:i:s A')."\r\n", FILE_APPEND | LOCK_EX);}
	}
	getp();
?>	
