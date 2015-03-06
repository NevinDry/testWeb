<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if ($_SESSION['user_type']=='utilisateur'){
		header('location:../session.php');
	}else{
?>	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/bootstrap.css"/>
		<link rel="stylesheet" href="../css/bootstrap-theme.css"/>
		<h1 class="texte">Gestion Admin</h1>
	</head>
	
	<body>
		<table class="table table-hover">
	  		<tr>
	    		<th>ID utilisateur</th>
	    		<th>e-mail utilisateur</th>
	    		<th>Pseudo utilisateur</th>
	    		<th>Adresse utilisateur</th>
	  		</tr>
<?php 	  					
	$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error()); 					
	  					
	$sqlRequestForUserGestion = 'select user_id, user_mail, user_pseudo, user_adresse from user';
	$req = mysqli_query($db, $sqlRequestForUserGestion) or die('Erreur SQL !<br>'.$sqlRequestForUserGestion.'<br>'.mysql_error());
	while ($dataResultRequete = mysqli_fetch_assoc($req)){ 					 						
		echo ("<tr>
				<td>".$dataResultRequete['user_id']."</td>
				<td>".$dataResultRequete['user_mail']."</td>
				<td>".$dataResultRequete['user_pseudo']."</td>
				<td>".$dataResultRequete['user_adresse']."</td>
		  	</tr>");
	}
?>
	  				
	  		</table>	
		</body>	
	</html>	
<?php }
?>
