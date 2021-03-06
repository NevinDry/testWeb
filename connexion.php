<?php

// connexion à la base de données
require('infobase.php');
//$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());

// récupération des données du formulaire de connexion --> index.php avec la "method POST"

if(isset($_POST['pseudoConnexion'])){
	$pseudoConnexion=mysqli_real_escape_string($db,$_POST['pseudoConnexion']);
}
else{
	$pseudoConnexion="";
}

if(isset($_POST['passwordConnexion'])){
	$passwordConnexion=mysqli_real_escape_string($db,$_POST['passwordConnexion']);
}
else{
	$passwordConnexion="";
}

if(isset($_POST) && !empty($_POST['pseudoConnexion']) && !empty($_POST['passwordConnexion'])){
	extract($_POST);
	
// on recupére le password de la table qui correspond au login du visiteur
// requéte qui récupére mdp, mail et adresse de la base de données à partir du pseudo de connexion

	$sqlRequestForConnect = "select user_id, user_password, user_mail, user_adresse, user_type from user where user_pseudo='".$pseudoConnexion."'";
	$req = mysqli_query($db, $sqlRequestForConnect) or die('Erreur SQL !<br>'.$sqlRequestForConnect.'<br>'.mysql_error());

	$dataResultRequete = mysqli_fetch_assoc($req);

// si le mdp est faut alors erreur	
	
if($dataResultRequete['user_password'] != md5($passwordConnexion)){
		echo '<p>Mauvais login / password. Merci de recommencer</p>';
		include('index.php'); // On inclut le formulaire d'identification
		exit;
}

// sinon la session démarre

else{
	session_start();
	
	$_SESSION['user_id']= $dataResultRequete['user_id'];
	$_SESSION['pseudoConnexion'] = $pseudoConnexion;
	$_SESSION['user_mail'] = $dataResultRequete['user_mail'];
	$_SESSION['user_adresse'] = $dataResultRequete['user_adresse'];
	$_SESSION['user_type'] = $dataResultRequete['user_type'];

// renvoi à la page session	
	
	header('location: session.php');
}	
	
}
else{
	echo '<p>Vous avez oublié de remplir un champ.</p>';
	include('index.php'); // On inclut le formulaire d'identification
	exit;
}

mysqli_close($db);  // on ferme la connexion
?>