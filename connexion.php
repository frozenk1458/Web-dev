<!-- Developed by Frozenk-->
<!-- All rights reserved. Copyrights Frozenk -->

<?php
connectionbd();
directory();
function directory()
{
	echo "</br>You can change your details with the link below.</br>";
	echo "<a href='directory.html'> directory </a>";
}
function connectionbd(){
echo "</br>";
$servername = "localhost";
$username = "root";
$code = fopen("pass/pass.txt", "r");
$line = "";
while (!feof($code)) { //Read till the end of file
  $line .= fgets($code, 4096); // Read line by line
  $pass = $line;
}
$db = "user";

try {
    $conn = mysqli_connect($servername,$username,$pass,$db);
	//$file = 'log.txt';
		file_put_contents('log.txt', "Connected successfully : ".date('l jS \of F Y h:i:s A')."\r\n", FILE_APPEND | LOCK_EX);
		$response = mysqli_query($conn, "SELECT * FROM users");
    
	while($donnees = mysqli_fetch_array($response))
	{
		if ($donnees['login'] == $_GET['login'] && $donnees['pass'] == $_GET['password'])
		{
			file_put_contents('log.txt', "The user ".$_GET['login']." is connected : ".date('l jS \of F Y h:i:s A')."\r\n", FILE_APPEND | LOCK_EX);
			echo "Your connection is authorized.</br> Welcome " . $_GET['login'];
		}
		else {
			echo "You are not authorized to access the website. If you entered a wrong login or password, please try again by clicking the link below.";
			echo "</br>";
			echo "<a href='index.html'> Re-enter authentication login </a>";
		}
	}
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	mysqli_close($conn);
}
?>