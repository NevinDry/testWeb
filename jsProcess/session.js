$( document ).ready(function() {
	$(".boutonSupprimerCodeBarre").click(function() { 
		var elementBouton = $(this);
		var codeBarreId=$(this).val();
		
		console.log(codeBarreId);

		$.ajax({
		       url : 'supprimerCodeBarre.php',
		       type : 'GET', // Le type de la requête HTTP, ici devenu POST
		       data : 'str=' + codeBarreId, // On fait passer nos variables, exactement comme en GET, au script more_com.php
		       dataType : 'html',
		    	   success : function(code_html, statut){ // success est toujours en place, bien sûr !
		    		   console.log ("réussi");
		    		   elementBouton.parent().parent().parent().remove();
		    		   $(".codeBarreSupprime").show('Shake').delay('1500');
		    		   $(".codeBarreSupprime").hide('Shake');
		    		  
		           },
		           error : function(resultat, statut, erreur){
		        	  
		           }
		    });
	});
});