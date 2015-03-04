<!DOCTYPE html>

<?php
	session_start();
	if (isset($_SESSION['pseudoConnexion'])){
		header('location: session.php');
	}else{ 	
	?>
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.css"/>
		<title>Bonjour</title>
		<h1 id="titre">Bonjour</h1>
	</head>
	<script>
				function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#FFD9CF";
   else
      champ.style.backgroundColor = "";
}
 
function verifpassword2(champ)
{
	
	
   if(champ.value == document.getElementById('password').value)
   { 
		surligne(champ, false);
		document.getElementById("boutonValideInscription").disabled = false;
   		return true;
	  
   }
   else
   {
		surligne(champ, true);
		document.getElementById("boutonValideInscription").disabled = true;
		return false;
   }
}
</script>
	<body>
		<div id="formulaire">
			<div id="inscription">
				<form method="post" action="inscription.php">
					<h3>Inscription</h3>
					<div class="lineForm"><label>Adresse e-mail:</label> <input class="form-control" type="email" id="email" name="email"></div>
					<div class="lineForm"><label>Pseudo:</label> <input  class="form-control" type="text" id="pseudo" name="pseudo"></div>
					<div class="lineForm"><label>Adresse:</label> <input  class="form-control" type="text" id="adresse" name="adresse"></div>
					<div class="lineForm"><label>Mot de passe:</label> <input  class="form-control" type="password" id="password" name="password"></div>
					<div class="lineForm"><label>Confirmer:</label> <input class="form-control" type="password" id="password2" name="password2" onblur="verifpassword2(this)"></div>
					<div class="lineForm"><input type="submit" class="btn" id="boutonValideInscription" name="valider" value="valider"></div>
				</form>
			</div>
		
			<div id="connexion">
				<form method="post" action="connexion.php">
					<h3>connexion</h3>
					<div class="lineForm"><label>Pseudo:</label> <input  class="form-control" type="text" id="pseudoConnexion" name="pseudoConnexion"></div>
					<div class="lineForm"><label>Mot de passe:</label> <input  class="form-control" type="password" id="passwordConnexion" name="passwordConnexion"></div>
					<div class="lineForm"><input type="submit" class="btn" id="boutonValideConnexion" name="valider" value="valider"></div>
				</form>
			</div>
		</div>	
	</body>

	<footer>
		<a id="mentions" href="http://google.fr">mentions légales</a>
		<a id="plan" href="http://google.fr">plan du site</a>
	</footer>
</html>
<?php }
?>