<!-- Developed by Frozenk-->
<!-- All rights reserved. Copyrights Frozenk -->

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
	connectionbd();
	getp();
function directory()
{
	echo "</br>You can change your details with the link below.</br>";
	echo "<a href='directory.php'> directory </a>";
}
function connectionbd(){
	if (empty($_GET['login']))
	{
		$_SESSION['message']="Login is empty.";
		header('Location: index.php');
		exit();
	}
	if (empty($_GET['password']))
	{
		$_SESSION['message']="Password is empty.";
		header('Location: index.php');
		exit();
	}
echo "</br>";
$servername = "localhost";
$username = "root";
$code = fopen("C:\wamp64\www\mysql - pass\pass\pass.txt", "r");
$line = "";
while (!feof($code)) { //Read till the end of file
  $line .= fgets($code, 4096); // Read line by line
  $pass = $line;
}
$db = "user";

try {
    $conn = mysqli_connect($servername,$username,$pass,$db);
	$response = mysqli_query($conn, "SELECT * FROM users");
    
	
	while($donnees = mysqli_fetch_array($response))
	{
		
		if (empty($_GET['login']))
		{
			$_SESSION['login']="Login is empty.";
			header('Location: index.php');
		}
		else
		{
			if (empty($_GET['password']))
			{	
				$_SESSION['pass']="Password is empty.";
				header('Location: index.php');
			}
			if ($_GET['login']!=$donnees['login'])
				{
					$_SESSION['message']="Login do not match";
					header('Location: index.php');
					exit();
				}
				else
				{
					if ($_GET['password']!=$donnees['pass'])
					{
						$_SESSION['message']="Password is not correct";
						header('Location: index.php');
						exit();
					}
					else
					{
						$_SESSION['connected']="OK";
						$_SESSION['login']=$_GET['login'];
						header('Location: directory.php');
						exit();
					}
				}
		}
	}
	$_SESSION['message']="You are not allowed to sign in.";
	header('Location: index.php');
	exit();
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	mysqli_close($conn);
}
?>