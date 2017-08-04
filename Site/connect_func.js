function connect_func(sVariable) {
  // Éliminer le "?"
  var sReq = window.location.search.substring(1);
  // Matrice de la requête
  var aReq = sReq.split("&");
  var login = " ";
  var pass = " ";
  // Boucle les variables
  for (var i=0;i<aReq.length;i++) {
    // Matrice de la variables / valeur
    var aVar = aReq[i].split("=");
	if(aVar[0] == 'login'){aVar[1]=login;}
	if(aVar[0] == 'password'){aVar[1]=pass;}
	}
 return login;
 return pass;
}
