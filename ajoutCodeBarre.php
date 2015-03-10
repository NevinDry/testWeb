<?php
// connexion à la base
require('infobase.php');
//$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());
session_start();

// récupération des données du formulaire de codebarre.php avec la "method POST"

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

if(isset($_FILES["imageCodeBarre"]["name"])){
	$imageCodeBarre=mysqli_real_escape_string($db,$_FILES["imageCodeBarre"]["name"]);
}
else{
	$imageCodeBarre="";
}

if(isset($_FILES['imageProduit']["name"])){
	$imageProduit=mysqli_real_escape_string($db,$_FILES['imageProduit']["name"]);
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

// On vérifie si les champs sont vides
if(empty($nom) OR empty($reference) OR empty($imageCodeBarre) OR empty($imageProduit)){
	echo '<font color="red">Attention, champ vide !</font>';
	echo $nom;
	echo $reference;
	echo $imageCodeBarre;
	echo $imageProduit;
	echo $_FILES["imageCodeBarre"]["name"];
}

// Aucun champ n'est vide, on peut enregistrer dans la table
else{
	
	// on écrit la requéte sql
	$sql = 'INSERT INTO codebarre(codebarre_nom, codebarre_ref, codebarre_description, codebarre_image, codebarre_image_produit, codebarre_type, codebarre_user_id) VALUES("'.$nom.'","'.$reference.'","'.$description.'","'.$imageCodeBarre.'","'.$imageProduit.'","'.$type.'","'.$_SESSION['user_id'].'")';
	
	// on éxécute la requête
	$db->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
	
	// on affiche le résultat pour le visiteur
	header('Content-Type: text/html; charset=utf-8');
	
	// on appelle les fonctions écrites plus bas
	
	uploadImageCodeBarre();
	uploadImageProduit();
	echo 'Vos infos ont été ajoutées.';
	include 'session.php';
	
	
	
	mysqli_close($db);  // on ferme la connexion
}




// fonctions:

function uploadImageCodeBarre(){
	
	//emplacement de l'image:
	
	$target_dir = "images/imageCodeBarre/";
	$target_file = $target_dir . basename($_FILES["imageCodeBarre"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["imageCodeBarre"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["imageCodeBarre"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["imageCodeBarre"]["name"]). " has been uploaded.</br>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}

function uploadImageProduit(){
	$target_dir = "images/imageProduit/";
	$target_file = $target_dir . basename($_FILES["imageProduit"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["imageProduit"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["imageProduit"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["imageProduit"]["name"]). " has been uploaded.</br>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	}


?>