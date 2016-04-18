<!-- Development by Frozenk-->
<!-- All rights reserved. Copyrights Frozenk -->

<!DOCTYPE html>
<html>
<head>
	<title>Login.php</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<meta name="Frozenk" content="Local Author">
</head>
<body>
<?php 
session_start();
if($_SESSION['connected']!="OK") {session_unset(); session_write_close(); header('Location: index.php'); exit();}
include('connexion.php');
	$pageURL = 'http';
	if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
		$pageURL .= "://";
	if ($_SERVER['SERVER_PORT'] != "80") {
	$pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	if(isset($_SESSION['connected'])) {if($_SESSION['connected']=="OK")file_put_contents('log - '.$_GET['login'].'.txt', "Access to page ". $pageURL." : ".date('l jS \of F Y h:i:s A')."\r\n", FILE_APPEND | LOCK_EX);}
	?>
		<script type="text/javascript">
		function s(){
		
			// Éliminer le "?"
			var sReq = window.location.search.substring(1);
			
			// Matrice de la requête
			var aReq = sReq.split("&");
		
			// Boucle les variables
			for (var i=0;i<aReq.length;i++) {
			// Matrice de la variables / valeur
			var aVar = aReq[i].split("=");
			// Retourne la valeur si la variable 
			// demandée = la variable de la boucle
			//document.writeln("Bienvenue "+aVar[1]+" !");
			if(aVar[0] == sVariable){
			document.writeln(aVar[1]);
			return aVar[1];}
			}
			}
			s();
</script>
<!-- retour au code HTML -->
</br>
<form action="func.php">
    <input type="submit" name="Disconnect" value="Disconnect" onclick="Disconnect" />
</form>
<!-- Here must be modify to on-click event. On click on the button Disconnect we unsert variable of session and redirect to connect page -->
<!-- <p> <a href="index.php"> --> <!--- ?php session_unset(); session_write_close(); ?> Disconnect </a></p> -->
</br>
</body>
</html>