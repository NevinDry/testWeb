<html>
	<head>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.css"/>
		<h1>Ajout de code barre</h1>
	</head>
	
	<body>
	
	<!-- création d'un formulaire avec la "method POST" -->
	
		<form method="post" class="formulaireAjoutCodeBarre" action="ajoutCodeBarre.php" enctype="multipart/form-data">
			<div class="lineForm"><label>Nom:</label> <input class="form-control" type="text" id="nom" name="nom"></div>
			</br>
			<div class="lineForm"><label>Référence:</label> <input class="form-control" type="text" id="reference" name="reference"></div>
			</br>
			<div>
			<label>Description:</label> 
			</br>
			<textarea id="description" class="form-control" name="description" ></textarea>
			</div>
			</br>
			
			<!-- type file = uploader une image, un fichier depuis son ordinateur -->
			
			<div><label class="parcourir">Image du code barre:</label> <input type="file" accept="image/*" name="imageCodeBarre" class="parcourir"></div>
			</br>
			<div><label class="parcourir">Image du produit:</label> <input type="file" accept="image/*" name="imageProduit" class="parcourir"></div>
			</br>
			<div class="lineForm"><input type="submit" class="btn" id="boutonAjouterCodeBarre" name="valider" value="Ajouter"></div>
			</br>
			<div id="selectionTypeCodeBarre">
			<label for="typeCodeBarre">Type de code barre:</label>
			<select name="type" id="type">
				<option value="1D">1D</option>
				<option value="2D">2D</option>
			</select>
			</div>		
		</form>	
	</body>
</html>