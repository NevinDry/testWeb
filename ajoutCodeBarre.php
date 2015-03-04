<?php
// connexion à la base
$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());


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