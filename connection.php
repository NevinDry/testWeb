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

	$sql = "select user_password from user where user_pseudo='".$pseudoConnection."'";
	$req = mysqli_query($db, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

	$data = mysqli_fetch_assoc($req);

if($data['user_password'] != md5($passwordConnection)){
		echo '<p>Mauvais login / password. Merci de recommencer</p>';
		include('index.html'); // On inclut le formulaire d'identification
		exit;
}

else{
	session_start();
	$_SESSION['pseudoConnection'] = $pseudoConnection;
	echo 'Vous etes bien logué';
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