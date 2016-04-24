<!-- Developed by Frozenk-->

<?php
session_start();
if ($_SESSION['connected']=="OK")
	{
		$_SESSION['exist_login']="You are already log in.";
		header('Location: index.php');
		exit();
	}
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
while (!feof($code)) { 
  $line .= fgets($code, 4096); 
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
			exit();
		}
		else
		{
			if (empty($_GET['password']))
			{	
				$_SESSION['pass']="Password is empty.";
				header('Location: index.php');
				exit();
			}
			if ($_GET['login']!=$donnees['login'])
				{
					$_SESSION['message']="Login do not correct";
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
						$_SESSION['messconnected']="You are connected.";
						require("connexion.php");
						header('Location: index.php');
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
	mysqli_close($conn);
    }
?>