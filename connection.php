<?php

$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());

if(isset($_POST['pseudoConnection'])){
	$pseudoConnection=mysqli_real_escape_string($db,$_POST['pseudoConnection']);
}
else{
	$pseudoConnection="";
}

if(isset($_POST['passwordConnection'])){
	$passwordConnection=mysqli_real_escape_string($db,$_POST['passwordConnection']);
}
else{
	$passwordConnection="";
}

if(isset($_POST) && !empty($_POST['pseudoConnection']) && !empty($_POST['passwordConnection'])){
	extract($_POST);
	
// on recupère le password de la table qui correspond au login du visiteur
// requête qui récupère mdp, mail et adresse de la base de données à partir du pseudo de connection

	$sqlRequestForConnect = "select user_password, user_mail, user_adresse from user where user_pseudo='".$pseudoConnection."'";
	$req = mysqli_query($db, $sqlRequestForConnect) or die('Erreur SQL !<br>'.$sqlRequestForConnect.'<br>'.mysql_error());

	$dataResultRequete = mysqli_fetch_assoc($req);

if($dataResultRequete['user_password'] != md5($passwordConnection)){
		echo '<p>Mauvais login / password. Merci de recommencer</p>';
		include('index.html'); // On inclut le formulaire d'identification
		exit;
}

else{
	session_start();
	$_SESSION['pseudoConnection'] = $pseudoConnection;
	$_SESSION['user_mail'] = $dataResultRequete['user_mail'];
	$_SESSION['user_adresse'] = $dataResultRequete['user_adresse'];
}	

		
// ici vous pouvez afficher un lien pour renvoyer
// vers la page d'accueil de votre espace membres
	
}
else{
	echo '<p>Vous avez oublié de remplir un champ.</p>';
	include('index.html'); // On inclut le formulaire d'identification
	exit;
}

mysqli_close($db);  // on ferme la connexion
?>