 <?php
// On commence par r�cup�rer les champs


 // connexion � la base
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


// On v�rifie si les champs sont vides
if(empty($adressemail) OR empty($pseudo) OR empty($adresse) OR empty($motdepasse)){
    echo '<font color="red">Attention, champ vide !</font>';
}

// Aucun champ n'est vide, on peut enregistrer dans la table
else{
	
	// s�lection de la base  

    
    // on �crit la requ�te sql
    $sql = 'INSERT INTO user(user_mail, user_pseudo, user_adresse, user_password) VALUES("'.$adressemail.'","'.$pseudo.'","'.$adresse.'","'.md5($motdepasse).'")';
    
    // on ins�re les informations du formulaire dans la table
    $db->query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());

    // on affiche le r�sultat pour le visiteur
    header( 'content-type: text/html; charset=utf-8' );
    echo 'Inscription r�ussi, veuillez vous connecter';
    include 'index.php';
    
    
    

mysqli_close($db);  // on ferme la connexion
exit;
    
}
?> 