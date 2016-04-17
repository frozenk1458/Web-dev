<!-- Developed by Frozenk-->
<!-- All rights reserved. Copyrights Frozenk -->

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<meta name="author" content="Local Author">
	<!-- <meta http-equiv="refresh" content="10"> -->
</head>
<body>
	<p>
	<?php 
	session_start();
	if(isset($_SESSION['connected'])) {if($_SESSION['connected']=="OK") {session_write_close(); session_start();}}
	$pageURL = 'http';
	if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
		$pageURL .= "://";
	if ($_SERVER['SERVER_PORT'] != "80") {
	$pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	if(isset($_GET['login']) && (isset($_SESSION['connected']) || $_SESSION['connected']=="OK"))file_put_contents('log - '.$_GET['login'].'.txt', "Access to page ". $pageURL." : ".date('l jS \of F Y h:i:s A')."\r\n", FILE_APPEND | LOCK_EX);
	?>
	</p>
	<p>Connexion to the website :<p>
	<FORM action="connexion.php" method="GET">
		<P>
			<LABEL for="login">Login : </LABEL>
              <INPUT type="text" name="login" id="login" placeholder="Enter login"></BR></br>
		    <LABEL for="password">Password : </LABEL>
              <INPUT type="password" name="password" id="password" placeholder="Enter password"></BR>
			  </br>
			<INPUT type="submit" value="Envoyer"> <INPUT type="reset">
		</P>
	</FORM>
	<p id="mes"> <?php if(isset($_SESSION['message'])) { echo "&#9888".$_SESSION['message']; session_unset(); session_write_close();} ?></p>
	<p id="mes"> <?php if(isset($_SESSION['pass'])) { echo "&#9888".$_SESSION['pass']; session_unset(); session_write_close();} ?></p>
	<p id="mes"> <?php if(isset($_SESSION['login'])) { echo "&#9888".$_SESSION['login']; session_unset(); session_write_close();} ?></p>
    <script type="text/javascript">
	button type="button" 
	onclick="document.getElementById('demo').innerHTML = Date()">
		Click me to display Date and Time.
	</button>
	</script>
	<p id="demo"> </p>
	<form action="func.php">
    <input type="submit" name="Disconnect" value="Disconnect" onclick="Disconnect" />
</form>
	<!-- Here must be modify to on-click event. On click on the button Disconnect we unsert variable of session and redirect to connect page -->
<!-- <p> <a href="index.php"> --> <!--- ?php session_unset(); session_write_close(); ?> Disconnect </a></p> -->
</body>
</html>