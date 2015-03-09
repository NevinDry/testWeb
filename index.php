<!DOCTYPE html>

<?php
	session_start();
	if (isset($_SESSION['pseudoConnexion'])){
		header('location: session.php');
	}else{ 	
	?>
	
<html>
	<head>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="jsProcess/main.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.css"/>
		<title>Bonjour</title>
		<h1 id="titre">Bonjour</h1>
	</head>

	<body>
		<div id="formulaire">
			<div id="inscription">
					<h3>Inscription</h3>
					<div class="lineForm" id="emailForm"><label>Adresse e-mail:</label> <input class="form-control" type="email" id="email" name="email"></div>
					<div class="lineForm" id="pseudoForm"><label>Pseudo:</label> <input  class="form-control" type="text" id="pseudo" name="pseudo"></div>
					<div class="lineForm" id="adresseForm"><label>Adresse:</label> <input  class="form-control" type="text" id="adresse" name="adresse"></div>
					<div class="lineForm" id="passwordForm"><label>Mot de passe:</label> <input  class="form-control" type="password" id="password" name="password"></div>
					<div class="lineForm" id="password2Form"><label>Confirmer:</label> <input class="form-control" type="password" id="password2" name="password2"></div>
					<div class="lineForm"><input type="submit" class="btn" id="boutonValideInscription" name="valider" value="valider"></div>
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
		<div id="erreurInscription">Veuillez vérifier vos champs</div>
		<div id="inscriptionReussie">Inscription réussie ! Veuillez vous connectez</div>
		<div id="inscriptionRatee">Inscription ratée !</div>	
	</body>

	<footer>
		<a id="mentions" href="http://google.fr">mentions légales</a>
		<a id="plan" href="http://google.fr">plan du site</a>
	</footer>
</html>
<?php }
?>