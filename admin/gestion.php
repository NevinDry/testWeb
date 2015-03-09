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
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
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
	    		<th>ID</th>
	    		<th>e-mail</th>
	    		<th>Pseudo</th>
	    		<th>Adresse</th>
	    		<th>Type</th>
	    		<th>Supprimer</th>
	  		</tr>
<?php 	  					
	$db = mysqli_connect('localhost', 'root', '', "testweb")  or die('Erreur de connexion '.mysql_error()); 					
	  					
	$sqlRequestForUserGestion = 'select user_id, user_mail, user_pseudo, user_adresse, user_type from user';
	$req = mysqli_query($db, $sqlRequestForUserGestion) or die('Erreur SQL !<br>'.$sqlRequestForUserGestion.'<br>'.mysql_error());
	while ($dataResultRequete = mysqli_fetch_assoc($req)){ 					 						
		echo ("<tr>
				<td>".$dataResultRequete['user_id']."</td>
				<td>".$dataResultRequete['user_mail']."</td>
				<td>".$dataResultRequete['user_pseudo']."</td>
				<td>".$dataResultRequete['user_adresse']."</td>
				<td>".$dataResultRequete['user_type']."</td>
				");
	
					if ($dataResultRequete['user_type']=='utilisateur')
		  				echo ("
		  					<td>
		  						<div class='lineForm'>
		  							<a href='supprimerUtilisateur.php?std=".$dataResultRequete['user_id']."'>
		  								<input type='submit' class='btn' id='boutonSupprimerUtilisateur' name='Supprimer' value='Supprimer'>
		  							</a>
		  						</div>
  						</td>
		  	</tr>");
	}
?>
	  				
	  		</table>	
		</body>	
	</html>
<?php }?>	