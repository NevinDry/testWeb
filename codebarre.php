<html>
	<head>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/bootstrap-theme.css"/>
		<h1>Ajout de code barre</h1>
	</head>
	
	<body>
		<form method="post" class="formulaireAjoutCodeBarre" action="ajoutCodeBarre.php">
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
			<div><label class="parcourir">Image du code barre:</label> <input type="file" accept="image/*" name="imageCodeBarre" class="parcourir"></div>
			</br>
			<div><label class="parcourir">Image du produit:</label> <input type="file" accept="image/*" name="imageProduit" class="parcourir"></div>
			</br>
			<div class="lineForm"><input type="submit" class="btn" id="boutonAjouterCodeBarre" name="valider" value="Ajouter"></div>		
		</form>	
	</body>
</html>