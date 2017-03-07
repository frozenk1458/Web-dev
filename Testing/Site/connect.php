<!-- Developed by Frozenk-->

<!DOCTYPE html>
<html>
<head>
	<title>news.php</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<meta name="author" content="Local Author">
</head>
<body>
<div class="connect"> 
<p><p>
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
	<FORM action="dbconnect.php" method="GET">
		<P>
			<LABEL for="login">Login : </LABEL>
              <INPUT type="text" name="login" id="login" placeholder="Enter login"></BR></br>
		    <LABEL for="password">Password : </LABEL>
              <INPUT type="password" name="password" id="password" placeholder="Enter password"></BR>
			  </br>
			<button type="submit" formaction="dbconnect.php">Envoyer</button>
			<button type="reset" formaction="dbconnect.php">Reset</button>
		</P>
	</FORM>
	<!--- Connexion message if something wrong with authentication details --->
	<p id="al"> <?php if(isset($_SESSION['message']) && empty($_SESSION['login'])) { echo "&#9888".$_SESSION['message']; session_unset(); session_write_close();} ?></p>
	<p id="al"> <?php if(isset($_SESSION['pass']) && empty($_SESSION['login'])) { echo "&#9888".$_SESSION['pass']; session_unset(); session_write_close();} ?></p>
	<p id="al"> <?php if(isset($_SESSION['login']) && empty($_SESSION['login'])) { echo "&#9888".$_SESSION['login']; session_unset(); session_write_close();} ?></p>
    <!-- Case: The user is already log in -->
	<p id="al"> <?php if((isset($_SESSION['login'])) && (isset($_SESSION['exist_login'])) && ($_SESSION['connected']=="OK")) { echo "&#9888".$_SESSION['exist_login']; echo "</br></br>";} ?></p>
	<?php
		if (isset($_SESSION['not exist_login'])) { echo "<p id='al'>&#9888".$_SESSION['not exist_login']."</p></br></br>";}
	?></p>
</div>
</body>
</html>