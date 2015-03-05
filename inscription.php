 <?php
// On commence par récupérer les champs


 // connexion é la base
 $db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error());
 
 
if(isset($_POST['email'])){      
	$adressemail=mysqli_real_escape_string($db,$_POST['email']);
}
else{
	$adressemail="";
}

if(isset($_POST['pseudo'])){
	$pseudo=mysqli_real_escape_string($db,$_POST['pseudo']);
}
else{
	$pseudo="";
}

if(isset($_POST['adresse'])){
	$adresse=mysqli_real_escape_string($db,$_POST['adresse']);
}
else{
	$adresse="";
}

if(isset($_POST['password'])){
	$motdepasse=mysqli_real_escape_string($db,$_POST['password']);
}
else{
	$motdepasse="";
}


// On vérifie si les champs sont vides
if(empty($adressemail) OR empty($pseudo) OR empty($adresse) OR empty($motdepasse)){
    echo '<font color="red">Attention, champ vide !</font>';
}

// Aucun champ n'est vide, on peut enregistrer dans la table
else{
	
	// sélection de la base  

    
    // on écrit la requéte sql
    $sql = 'INSERT INTO user(user_mail, user_pseudo, user_adresse, user_password) VALUES("'.$adressemail.'","'.$pseudo.'","'.$adresse.'","'.md5($motdepasse).'")';
    
    // on insére les informations du formulaire dans la table
    $db->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

    // on affiche le résultat pour le visiteur
    header( 'content-type: text/html; charset=utf-8' );
    echo 'Inscription réussi, veuillez vous connecter';
    include 'index.php';
    
    
    

mysqli_close($db);  // on ferme la connexion
exit;
    
}
?> 