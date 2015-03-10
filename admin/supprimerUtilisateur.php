<?php
require('../infobase.php');
//$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());

if(isset($_GET["std"]))
{

	$sql='DELETE FROM user WHERE user_id=('.$_GET["std"].')';
	$db->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
	header('location: gestion.php');
}
?>