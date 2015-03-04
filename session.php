<?php
//*//
	session_start();
	if ($_SESSION['pseudoConnexion']==null){
		header('location: index.php');
	}else{ 	
	?>

<html>
	<head>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.css"/>
		<h1 class="texte">Espace membre</h1>
	</head>
	
		<body>
			<div id="vosInformations">
				<h4 class="texte">Vos informations:</h4>
					<div class="texte" id="informationSession">
						<?php
						echo ($_SESSION['pseudoConnexion']);
						?>
						</br>
						<?php
						echo ($_SESSION['user_mail']);
						?>
						</br>
						<?php 
						echo ($_SESSION['user_adresse']);
						?>
						<form method="link" action="codebarre.php"><div class="lineForm"><input type="submit" class="btn" id="boutonCodeBarre" value="Ajouter un code barre"></div></form>
					</div>
				</div>
			<form action="deconnexion.php" method="post">	
				<div class="lineForm"><input type="submit" class="btn" id="boutonDeconnexion" name="deconnexion" value="Déconnexion"></div>
			</form>
		</body>
		
</html>
<?php }
?>
