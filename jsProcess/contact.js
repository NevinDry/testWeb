$( document ).ready(function() {
	$( "#bboutonValideEnvoyer" ).click(function() { 
		var email=$("#email").val();
		var nom=$("#nom").val();
		var commentaire=$("#commentaire").val();
		
		if(checkinput(email, nom, commentaire, )){
			$("#erreurInscription").hide('Shake');	
		$.ajax({
		       url : 'envoiContact.php',
		       type : 'POST', // Le type de la requête HTTP, ici devenu POST
		       data : 'email=' + email + '&nom=' + nom + '&commentaire=' + commentaire, // On fait passer nos variables, exactement comme en GET, au script more_com.php
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
			$("#erreurEnvoi").show('Shake');
			
		}
	});
});

function checkinput(email, nom, commentaire){
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
	return result;
}
});