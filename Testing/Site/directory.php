<!-- Developed by Frozenk-->

<!DOCTYPE html>
<html>
<head>
<title>Directory.php</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
session_start();
	$pageURL = 'http';
	if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
		$pageURL .= "://";
	if ($_SERVER['SERVER_PORT'] != "80") {
	$pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	if(isset($_SESSION['connected']) && $_SESSION['connected']!="OK") {$_SESSION['not exist_login']="You are not allowed  to go further.";}
	if(isset($_SESSION['connected']) && $_SESSION['connected']=="OK") file_put_contents('log - '.$_SESSION['login'].'.txt', "Access to page ". $pageURL." : ".$_SESSION['login']."; ".date('l jS \of F Y h:i:s A')."\r\n", FILE_APPEND | LOCK_EX);
	?>
<!-- Body -->
<div class="bod">
<p>Dictory in construction</p>
</div>
</body>
</html>