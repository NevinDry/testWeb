<?php
$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());

if(isset($_GET["str"]))
{ 
	
	$sqlRequestForDetail = 'select codebarre_nom, codebarre_ref, codebarre_description, codebarre_image, codebarre_image_produit, codebarre_type from codebarre where codebarre_id=('.$_GET["str"].')';
	$req = mysqli_query($db, $sqlRequestForDetail) or die('Erreur SQL !<br>'.$sqlRequestForDetail.'<br>'.mysql_error());
	$dataResultRequete = mysqli_fetch_assoc($req);
	
	echo ("
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<link rel='stylesheet' href='css/style.css' />
		<link rel='stylesheet' href='css/bootstrap.min.css'/>
		<link rel='stylesheet' href='css/bootstrap.css'/>
		<link rel='stylesheet' href='css/bootstrap-theme.css'/>	
		<h1>".$dataResultRequete['codebarre_nom']."</h1>
			
		<div>Référence:".$dataResultRequete['codebarre_ref']."</div>
		<div>Description:".$dataResultRequete['codebarre_description']."</div>
			
			
			");
	
	
}
?>