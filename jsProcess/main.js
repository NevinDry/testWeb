$( document ).ready(function() {	// lancer la page js lorsqu'elle est prête 
	$( "#boutonValideInscription" ).click(function() { 	//la fonction s'éxécute lorsque l'on clique sur #boutonValideEnvoyer qui est ciblé par son "id" ou par sa "class"
		var email=$("#email").val();					//définition des variable
		var pseudo=$("#pseudo").val();
		var adresse=$("#adresse").val();
		var password=$("#password").val();
		var password2=$("#password2").val();

		if(checkinput(email, pseudo, adresse, password, password2)){	//lancement de la fonction "checkinput" en bas de la page
			$("#erreurInscription").hide('Shake');	
		$.ajax({
		       url : 'inscription.php',
		       type : 'POST', 							// Le type de la requête HTTP, ici devenu POST
		       data : 'email=' + email + '&pseudo=' + pseudo + '&adresse=' + adresse + '&password=' + password, // On fait passer nos variables, exactement comme en GET, au script more_com.php
		       dataType : 'html',
		    	   success : function(code_html, statut){ // success est toujours en place, bien sûr !
		    		   $("#inscriptionReussie").show('Shake');
		           },
		           error : function(resultat, statut, erreur){
		        	   $("#inscriptionRatee").show('Shake');
		           }
		    });
		}
		else{
			$("#erreurInscription").show('Shake');
			
		}
	});
});

function checkinput(email, pseudo, adresse, password, password2){
	$(".form-control").css({
		'border-color' : '#CCC'
	});
	var result = true;			// le résultat de base est "vrai"
	if (email=="") {			// si un champ est vide (=="") on modifie le code css puis on ajoute un effet jquery (shake)
		console.log ('email vide!');
		$("#email").css({
            'border-color' : 'red'
		});
		$("#emailForm").effect("shake",{times:5},500);
		result = false;			// si le champ est vide le résultat devient "faux" mais la fonction continue de s'éxécuter
	} 
	if (pseudo=="") {
		console.log ('pseudo vide!');
		$("#pseudo").css({
            'border-color' : 'red'
		});
		$("#pseudoForm").effect("shake",{times:5},500);
		result = false;
	}
	if (adresse=="") {
		console.log ('adresse vide!');
		$("#adresse").css({
            'border-color' : 'red'
		});
		$("#adresseForm").effect("shake",{times:5},500);
		result = false;
	}
	if (password=="") {
		console.log ('password vide!');
		$("#password").css({
            'border-color' : 'red'
		});
		$("#passwordForm").effect("shake",{times:5},500);
		result = false;
	}
	if (password2!=password) {
		console.log ('mauvais mot de passe!');
		$("#password2").css({
            'border-color' : 'red'
		});
		$("#password2Form").effect("shake",{times:5},500);
		result = false;			// on renvoi le résultat
	}
	return result;
}