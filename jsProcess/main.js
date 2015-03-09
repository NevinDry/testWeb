$( document ).ready(function() {
	$( "#boutonValideInscription" ).click(function() { 
		var email=$("#email").val();
		var pseudo=$("#pseudo").val();
		var adresse=$("#adresse").val();
		var password=$("#password").val();
		var password2=$("#password2").val();

		if(checkinput(email, pseudo, adresse, password, password2)){
			$("#erreurInscription").hide('Shake');	
		$.ajax({
		       url : 'inscription.php',
		       type : 'POST', // Le type de la requête HTTP, ici devenu POST
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
	var result = true;
	if (email=="") {
		console.log ('email vide!');
		$("#email").css({
            'border-color' : 'red'
		});
		$("#emailForm").effect("shake",{times:5},500);
		result = false;
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
		result = false;
	}
	return result;
}