<?php
// connexion � la base
$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());
session_start();

if(isset($_POST['nom'])){
	$nom=mysqli_real_escape_string($db,$_POST['nom']);
}
else{
	$nom="";
}

if(isset($_POST['reference'])){
	$reference=mysqli_real_escape_string($db,$_POST['reference']);
}
else{
	$reference="";
}

if(isset($_POST['description'])){
	$description=mysqli_real_escape_string($db,$_POST['description']);
}
else{
	$description="";
}

if(isset($_POST['imageCodeBarre'])){
	$imageCodeBarre=mysqli_real_escape_string($db,$_POST['imageCodeBarre']);
}
else{
	$imageCodeBarre="";
}

if(isset($_POST['imageProduit'])){
	$imageProduit=mysqli_real_escape_string($db,$_POST['imageProduit']);
}
else{
	$imageProduit="";
}

if(isset($_POST['type'])){
	$type=mysqli_real_escape_string($db,$_POST['type']);
}
else{
	$type="";
}

// On v�rifie si les champs sont vides
if(empty($nom) OR empty($reference) OR empty($imageCodeBarre) OR empty($imageProduit)){
	echo '<font color="red">Attention, champ vide !</font>';
}

// Aucun champ n'est vide, on peut enregistrer dans la table
else{
	
	// on �crit la requ�te sql
	$sql = 'INSERT INTO codebarre(codebarre_nom, codebarre_ref, codebarre_description, codebarre_image, codebarre_image_produit, codebarre_type, codebarre_user_id) VALUES("'.$nom.'","'.$reference.'","'.$description.'","'.$imageProduit.'","'.$imageCodeBarre.'","'.$type.'","'.$_SESSION['user_id'].'")';
	
	// on ins�re les informations du formulaire dans la table
	$db->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
	
	// on affiche le r�sultat pour le visiteur
	echo 'Vos infos ont �t� ajout�es.';
	
	mysqli_close($db);  // on ferme la connexion
}
?>