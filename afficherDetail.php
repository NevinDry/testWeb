<?php
// connexion à la base
$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());
// récupération des données de session.php passées en mode "GET"
if(isset($_GET["str"]))
{ 
// requête sql (select "informations" from "table de la base de données" where "quelle ligne?" 	
	$sqlRequestForDetail = 'select codebarre_nom, codebarre_ref, codebarre_description, codebarre_image, codebarre_image_produit, codebarre_type from codebarre where codebarre_id=('.$_GET["str"].')';
	$req = mysqli_query($db, $sqlRequestForDetail) or die('Erreur SQL !<br>'.$sqlRequestForDetail.'<br>'.mysql_error());
	$dataResultRequete = mysqli_fetch_assoc($req);
// résultat de la requête inséré dans un tableau
// echo pour utiliser le html dans le fichier php	
	echo ("
		<script type='text/javascript' src='js/jquery-1.11.2.min.js'></script>
		<script type='text/javascript' src='js/jquery-ui.min.js'></script>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<link rel='stylesheet' href='css/style.css' />
		<link rel='stylesheet' href='css/bootstrap.min.css'/>
		<link rel='stylesheet' href='css/bootstrap.css'/>
		<link rel='stylesheet' href='css/bootstrap-theme.css'/>	
		<h1 class='titreAfficherDetail'>".$dataResultRequete['codebarre_nom']."</h1>
		<a class='boutonRetourSession' href='session.php'>
		  	<input type='submit' class='btn' id='boutonRetourSession' name='Retour' value='Retour'>
		</a>	
		<div 
			class='referenceTypeDetail'>Référence:".$dataResultRequete['codebarre_ref']."
			</br>
			Type de code barre:".$dataResultRequete['codebarre_type']."
		</div>		
		<img class='imageDetail' src=images/imageCodeBarre/".$dataResultRequete['codebarre_image'].">
		<img class='imageDetail' src=images/imageProduit/".$dataResultRequete['codebarre_image_produit'].">
		<div class='descriptionDetail'><h5 class='titreDescription'>Description:</h5>".$dataResultRequete['codebarre_description']."</div>
		
			
			
			");
	
	// afficher un résultat de la requête : .$dataResultRequete['codebarre_nom']. 
}
?>