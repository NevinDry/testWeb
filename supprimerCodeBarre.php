<?php
$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());

if(isset($_GET["str"]))
{

$sql='DELETE FROM codebarre WHERE codebarre_id=('.$_GET["str"].')';
$db->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
header('location: session.php');
}    
?>