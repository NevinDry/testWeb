$( document ).ready(function() {		// lancer la page js lorsqu'elle est prête 
	$(".boutonSupprimerCodeBarre").click(function() { 
		var elementBouton = $(this);			// définition des variables
		var codeBarreId=$(this).val();			// "this" correspond à l'élément courant, ici: .boutonSupprimerCodeBarre (définit par sa .class ou son #id)
		
		console.log(codeBarreId);

		$.ajax({
		       url : 'supprimerCodeBarre.php',
		       type : 'GET', 					// Le type de la requête HTTP, ici devenu POST
		       data : 'str=' + codeBarreId, 	// On fait passer nos variables au script supprimerCodeBarre.php
		       dataType : 'html',
		    	   success : function(code_html, statut){ 					// success est toujours en place, bien sûr !
		    		   console.log ("réussi");
		    		   elementBouton.parent().parent().parent().remove();	// suppression du parent de l'élément courant (élément supérieur) ici le parent	du parent
		    		   $(".codeBarreSupprime").show('Shake').delay('1500'); // le delay fait durer le process ici : show, durant 1500ms soit 1,5 sec
		    		   $(".codeBarreSupprime").hide('Shake');
		    		  
		           },
		           error : function(resultat, statut, erreur){
		        	  
		           }
		    });
	});
});