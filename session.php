<?php
//*//
	if(!isset($_SESSION)){
			session_start();
	}
	if ($_SESSION['pseudoConnexion']==null){
		header('location: index.php');
	}else{ 	
	?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
			
			<table id="tableau" style="width:80%" class="table table-hover">
  				<tr>
    				<th>Nom</th>
    				<th>Référence</th>
    				<th>Description</th>
    				<th>Image du produit</th>
    				<th>Image du code barre</th>
    				<th>Type</th>
  				</tr>
  					<?php 
  					
  					$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());
  					
  					
  					
  					$sqlRequestInfoCodeBarre = "select codebarre_nom, codebarre_ref, codebarre_description, codebarre_image, codebarre_image_produit, codebarre_type from codebarre where codebarre_user_id='".$_SESSION['user_id']."'";
  					$req = mysqli_query($db, $sqlRequestInfoCodeBarre) or die('Erreur SQL !<br>'.$sqlRequestInfoCodeBarre.'<br>'.mysql_error());
  					while ($dataResultRequete = mysqli_fetch_assoc($req)){
  					echo ($dataResultRequete['codebarre_nom'].'</br>');
  					echo ($dataResultRequete['codebarre_ref'].'</br>');
  					echo ($dataResultRequete['codebarre_description'].'</br>');
  					echo ($dataResultRequete['codebarre_image'].'</br>');
  					echo ($dataResultRequete['codebarre_image_produit'].'</br>');
  					echo ($dataResultRequete['codebarre_type'].'</br>');
  					}
  						
  					?>
  				<tr>
  					
  				</tr>
  			</table>	
		</body>
		
</html>
<?php }
?>
