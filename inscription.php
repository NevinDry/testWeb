 <?php
 // connexion é la base
 $db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());
     
	$adressemail=mysqli_real_escape_string($db,$_POST['email']);
	$pseudo=mysqli_real_escape_string($db,$_POST['pseudo']);
	$adresse=mysqli_real_escape_string($db,$_POST['adresse']);
	$motdepasse=mysqli_real_escape_string($db,$_POST['password']);

    // on écrit la requéte sql
    $sql = 'INSERT INTO user(user_mail, user_pseudo, user_adresse, user_password) VALUES("'.$adressemail.'","'.$pseudo.'","'.$adresse.'","'.md5($motdepasse).'")';
    
    // on insére les informations du formulaire dans la table
    $db->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

mysqli_close($db);  // on ferme la connexion
exit;
?> 