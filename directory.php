<!-- Developed by Frozenk-->
<!-- All rights reserved. Copyrights Frozenk -->

<!DOCTYPE html>
<html>
<head>
<title>Annuaire.html</title>
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
	if($_SESSION['connected']!="OK") {session_unset(); session_write_close(); header('Location: index.php'); exit();}
	if($_SESSION['connected']=="OK") file_put_contents('log - '.$_SESSION['login'].'.txt', "Access to page ". $pageURL." : ".date('l jS \of F Y h:i:s A')."\r\n", FILE_APPEND | LOCK_EX);
	?>
<p>Annuaire in construction</p>
<a href="index.php">Back to home page</a>
</br>
</br>
<form action="func.php">
    <input type="submit" name="Disconnect" value="Disconnect" onclick="Disconnect" />
</form>
<!-- Here must be modify to on-click event. On click on the button Disconnect we unsert variable of session and redirect to connect page -->
<!-- <p> <a href="index.php"> --> <!--- ?php session_unset(); session_write_close(); ?> Disconnect </a></p> -->
</body>
</html>