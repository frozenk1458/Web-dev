<!-- Development by Frozenk-->
<!-- All rights reserved. Copyrights Frozenk -->

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<meta name="author" content="Local Author">
</head>
<body>
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
<?php include('connexion.php');?>
<!-- retour au code HTML -->
</br>
</body>
</html>