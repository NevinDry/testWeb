$( document ).ready(function() { 					// lancer la page js lorsqu'elle est prête 
	$( "#boutonValideEnvoyer" ).click(function() { 	//la fonction s'éxécute lorsque l'on clique sur #boutonValideEnvoyer qui est ciblé par son "id" ou par sa "class"
		var email=$("#email").val();				//définition des variable		
		var nom=$("#nom").val();
		var commentaire=$("#commentaire").val();
		
		if(checkinput(email, nom, commentaire)){	//lancement de la fonction "checkinput" en bas de la page
			$("#erreurInscription").hide('Shake');	
		$.ajax({
		       url : 'envoiContact.php',
		       type : 'POST', 						// Le type de la requête HTTP, ici devenu POST
		       data : 'email=' + email + '&nom=' + nom + '&commentaire=' + commentaire, // On fait passer nos variables au script envoiContact.php
		       dataType : 'html',
		    	   success : function(code_html, statut){ // success est toujours en place, bien sûr !
		    		   $("#envoiReussi").show('Shake');
		           },
		           error : function(resultat, statut, erreur){
		        	   $("#envoiRate").show('Shake');
		           }
		    });
		}
		else{
			$("#erreurInscription").show('Shake');
			
		}
	});
});


function checkinput(email, nom, commentaire){
	$(".form-control").css({
		'border-color' : '#CCC'
	});
	var result = true;		// le résultat de base est "vrai"
	if (email=="") {		// si un champ est vide (=="") on modifie le code css puis on ajoute un effet jquery (shake)
		console.log ('email vide!');
		$("#email").css({
            'border-color' : 'red'
		});
		$("#emailForm").effect("shake",{times:5},500);
		result = false;		// si le champ est vide le résultat devient "faux" mais la fonction continue de s'éxécuter
	} 
	if (nom=="") {
		console.log ('nom vide!');
		$("#nom").css({
            'border-color' : 'red'
		});
		$("#nomForm").effect("shake",{times:5},500);
		result = false;
	}
	if (commentaire=="") {
		console.log ('commentaire vide!');
		$("#commentaire").css({
            'border-color' : 'red'
		});
		$("#commentaireForm").effect("shake",{times:5},500);
		result = false;
	}
	return result;			// on renvoi le résultat
}
