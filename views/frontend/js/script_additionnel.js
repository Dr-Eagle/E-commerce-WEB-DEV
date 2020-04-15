$(document).ready(function () {
	
	var virement = $('#virement_user_panier');
	var livraison = $("#paymant_user_panier");
	var payment_ligne= $("#paymant_ligne_user_panier");
	var hauteur=$(".produit").height() - 500;

	init();

	/* option adresse formualaire panier*/
	$("#autre_adresse_user_panier").on('change',function () { 
        
        if ($(this).prop('checked')) {
            $(this).parent().next().slideDown('slow');  
        } else {
            $(this).parent().next().slideUp('slow');  
        }
	 });
	
	 
	/* option formulaire panier*/
    virement.on('change', function () {
        show_mode($(this));
    });
    livraison.on('change', function () {
        show_mode($(this));
	});
	payment_ligne.on('change', function () {
        show_mode($(this));
	});
	function show_mode(selection) {  
		$(".paymant").find(".mode").each(function(){
			$(this).next().slideUp('slow');
		});
		selection.parent().next().slideDown('slow'); 
	}
	
	/* ajout au panier produit simple*/
	$(".add_to_cart").on("click",function(event){
		event.preventDefault();

		$.get($(this).attr("href"), {},
			function (data, textStatus, jqXHR) {
				
				$(".cart_count").children('span').text(data['quantite']);
				$(".cart_price").children('span').text(data['total']);
				if(data['erreur'])
				{
					$('.alert').css({
						'display': 'block',
						'width' : '100%',
						'position' : 'fixed',
						'top':'0',
						'z-index' : '100000000000'
						
					});
					$('.alert').children('strong').text(data['erreur']);
				}
				
				setTimeout(function(){$('.alert').css('display','none');}, 3000);
			},
			"json"
		);
	});
	
	/* details historique commande */
    $(".exit").click(function (e) { 
		$(".modals").css("display", "none");
	});
	$(".details").on('click',function (event) { 
		event.preventDefault();
		$(".modals").css("display", "flex");

		var lien=$(this);
		
        $.get(lien.attr('href'),{},
            function (data) {
				console.log(data);
                $("#id_commande").val(data["commande"].id_commande);
				$("#nom").val(data["commande"].nom_client+"  "+data["commande"].prenom_client);
				$("#adresse_livraison").val(data["commande"].adresse_livraison);
				$("#adresse_livraison_2").val(data["commande"].adresse_livraison_2);
				$("#code_postal").val(data["commande"].code_postal);
				$("#ville").val(data["commande"].ville);
				$("#date_commande").val(data["date"]);
				$("#date_livraison").val(data["commande"].date_livraison);
				if(data['code_promo'])
				{
					$("#code_promo").text(data["code_promo"].code);
					$("#pourcentage").text("-"+data["code_promo"].pourcentage+"%");
				}
				else
				{
					$("#code_promo").text("");
					$("#pourcentage").text("");
				}
				$("#total_panier").text(data["panier"].prix_total);
				$("#total_remise").text(data["total_paye"]);
                $("#produit").children().remove($("#produit").children());
                $("#produit tr").remove();
				for (let i = 0; i < data["ligne_panier"].length; i++) {
					$("#produit").append( 
						"<tr><td scope='row bold'>"+data['produit']['nom_produit'][i]+"</td><td>"+data['ligne_panier'][i].quantite+"</td><td>"+data['produit']['prix'][i]+"</td><td>"+data['ligne_panier'][i].prix_ligne+"</td></tr> "
					);
				}
				
				for (let i = 0; i < data["produit_compose"]["nom"].length; i++) {
					var nom_produit_compose=data["produit_compose"]["nom"][i];
					var quantite=data["produit_compose"]["quantite"][i];
					var prix_unitaire=data["produit_compose"]["prix"][i];
					var prix_total=prix_unitaire*quantite;
					$("#produit").append( 
						"<tr><td scope='row bold'>"+nom_produit_compose+"</td><td>"+quantite+"</td><td>"+prix_unitaire+"</td><td>"+prix_total+"</td></tr> "
					);
				}
            },
            'json'
            
        );
        
	});
	/* fin details historique commande*/

	/* modification quantite panier*/
	$(".quantite").on('change',function (e) {
		var total=$(this);
		

	   $.post("recuperation/panier_add.php",
	   {
		   id_ligne : $(this).attr("data-id"),
		   quantite : $(this).val()
	   },
			function (data) {
				
				$(".cart_count").children('span').text(data['quantite']);
				$(".cart_price").children('span').text(data['total']);
				$(".cart_pric").children('span').text(data['total']);
				total.parent().next().children("span").text(data['total_ligne']);
				$("#total_remise").text(data['total_remise']);
				
			},
			"json"
	   );
			
	});

	/* modication de la quntite composite product*/
	$(".quantite_composite").on('change',function (e) {
		var total=$(this);
		
	   $.post("recuperation/add_composite_to_card.php",
	   {
		   nom_produit_compose : $(this).attr("data-nom_produit_compose"),
		   quantite : $(this).val()
	   },
			function (data) {
			
				$(".cart_count").children('span').text(data['quantite']);
				$(".cart_price").children('span').text(data['total']);
				$(".cart_pric").children('span').text(data['total']);
				total.parent().next().children("span").text(data['prix_composite']);
				var inputs=total.parents('tbody').find(".quantite");
				
				inputs.each(function (index, element) {
					console.log(total.attr("data-nom_produit_compose"));
					if($(this).attr("data-nom_produit_compose") == total.attr("data-nom_produit_compose"))
					{
						
						$(this).val(data['quantite_composite']);
						$(this).parents('tr').find("span").text($(this).attr('data-prix') * data["quantite_composite"]);
					}
				});
				$("#total_remise").text(data['total_remise']);
				
			},
			"json"
	   );
			
	});
	/* ajoout au panier composite product*/
	$("#add_to_cart").on('click',function (event) {
		event.preventDefault();
		$.post("recuperation/add_composite_to_card.php", 
		{ 
			ids_produit : get_selected_product(), 
			nom_produit_compose : get_nom_produit_compose(),
			
		},
			function (data, textStatus, jqXHR) {
				console.log(data);
				if(data['message'])
				{
					$('.alert').css({
						'display': 'block',
						'width' : '100%',
						'position' : 'fixed',
						'top':'0',
						'z-index' : '100000000000'
						
					});
					$('.alert').children('strong').text(data['message']);
					$('.alert').children('a').prop("href","cart.php");
					$('.alert').children('a').text("PANIER");
				
					setTimeout(function(){$('.alert').css('display','none');}, 6000);
				}
			},
			"json"
		);
		location.reload();
	});
	/* fin ajout au panier composiste*/

	/* product builder*/
	$('.sous_categorie a').on('click', function (event) {
		event.preventDefault();
		var id_sc=$(this).attr('data-id_sc');
		display(id_sc);
	});
	$('.produit_sous_categorie a').on('click',function(event){
		event.preventDefault();
		
		var id_sc=$(this).attr('data-id_sc');
		var id_produit=$(this).attr('data-id_produit');
		
		ajouter_product_builder(id_sc,id_produit);
	});
	$('.option .delete').on('click', function (event) {
		event.preventDefault();
		var id_sc=$(this).parents('.option').attr('data-id_sc');
		supprimer_product_builder(id_sc);
	});
	$("#builder_to_cart").on("click", function () {
		add_builder_to_card();
	});
	function supprimer_product_builder(id_sous_categorie) {
		var lien="recuperation/add_product_builder_to_cart.php?id_delete="+id_sous_categorie;
		$.get(lien, {},
			function (data, textStatus, jqXHR) {
				clear();
				invalide(id_sous_categorie);
				for (let i = 0; i < data.length; i++) {		
					injecter_donne(data[i]);	
				}
			},
			"json"
		);
	}
	function add_builder_to_card() {
		var lien="recuperation/add_product_builder_to_cart.php?add_to_cart=true";
		$.get(lien, {},
			function (data, textStatus, jqXHR) {
				console.log(data);
				$(".cart_count").children('span').text(data['quantite']);
				$(".cart_price").children('span').text(data['total']);
			},
			"json"
		);
	}
	function ajouter_product_builder(id_sous_categorie,id_produit) { 
		var lien="recuperation/add_product_builder_to_cart.php?id_produit="+id_produit+"&id_sc="+id_sous_categorie;
		$.get(lien, {},
			function (data, textStatus, jqXHR) {
				
				clear();
				for (let i = 0; i < data.length; i++) {		
					injecter_donne(data[i]);	
				}
			},
			"json"
		);
	}
	function init_product_buider() {
		var sous_cat_default=$('.sous_categorie ul a').attr('data-id_sc');
		display(sous_cat_default);
		var lien="recuperation/add_product_builder_to_cart.php?init=true";
		$.get(lien, {},
			function (data, textStatus, jqXHR) {
				
				for (let i = 0; i < data.length; i++) {		
					injecter_donne(data[i]);	
				}
			},
			"json"
		);
	}
	function clear() {
		var selection=$('.options .option');
		selection.each(function () {
				$(this).find('img').attr('src',"");
				$(this).find('.nom_sous_categorie').text("");
				$(this).find('.prix_single').text("");
				$(this).find('.prix_single').attr('data-prix',"");
				$(this).find('.nom_produit').text("");
				if(!$(this).hasClass('hidden'))
				{
					$(this).addClass('hidden');
				}
			
		});
	}
	function invalide(id_sous_categorie) {
		var sous_categorie=$('.sous_categorie a');
		sous_categorie.each(function (index, element) {
			var id_sc=$(this).attr('data-id_sc');
			if(parseInt(id_sc) == parseInt(id_sous_categorie))
			{
				if($(this).hasClass('valide'))
				{
					$(this).removeClass('valide');
				}
			}
			
		});
	}
	function injecter_donne(data) {
		var selection=$('.options .option');
		selection.each(function () {
			var id_sc=$(this).attr('data-id_sc');
			if(parseInt(id_sc) == parseInt(data.ide_sous_categorie))
			{
				$(this).find('img').attr('src',data.image_produit);
				$(this).find('.nom_sous_categorie').text(data.nom_sous_categorie);
				$(this).find('.prix_single').text(data.prix+" TND");
				$(this).find('.prix_single').attr('data-prix',data.prix);
				$(this).find('.nom_produit').text(data.nom_produit);
				if($(this).hasClass('hidden'))
				{
					$(this).removeClass('hidden');
				}
				valider(id_sc);	
			}
			afficher_prix_total();
		});
	}
	function valider(id_sous_categorie) {
		var sous_categorie=$('.sous_categorie a');
		sous_categorie.each(function (index, element) {
			var id_sc=$(this).attr('data-id_sc');
			if(parseInt(id_sc) == parseInt(id_sous_categorie))
			{
				if(!$(this).hasClass('valide'))
				{
					$(this).addClass('valide');
				}
			}
			
		});
	}
	function display(id_sous_categorie)
	{
		var produit=$('.produit_sous_categorie a');
		produit.each(function (index, element) {
			
			if(!$(this).hasClass('hidden'))
			{
				$(this).addClass('hidden');
			}
		});
		
		produit.each(function (index, element) {
			var id_sc=$(this).attr('data-id_sc');
			if(parseInt(id_sc) == parseInt(id_sous_categorie))
			{
				$(this).removeClass('hidden');
			}
		});
		
	}
	function afficher_prix_total() {
		var total=0;
		var selection=$('.options .option');
		selection.each(function (index, element) {
			console.log();
			var prix=$(this).find('.prix_single').attr('data-prix');
			if(prix)
			{
				total+=parseFloat(prix);
			}
		});
		$('.prix_total strong').text(total);
	}
	/* fin product builder*/

	/* debut composite product*/
    $(window).scroll(function () { 
		var obje=$(".ajouter_panier");
		
		if($(window).scrollTop() < hauteur)
		{
			obje.addClass('fixe');
		}
		else
		{
			obje.removeClass('fixe');
		}
	});
	$('.selected_option').on('click',function(event){
		event.preventDefault();
		var selection=$(this);
		change_selected(selection);
		difference_prix(selection);
		$('.prix_total strong').text(calculer_prix());
	});
	function get_selected_product()
	{
		var component=$('.produit');
		var selections=component.find('.selected');
		var selected_id=Array();
		selections.each(function (index, element) {
			var id=$(this).find('.prix_single').attr('data-id');
			selected_id.push(id);
		});
		return selected_id;
	}
	function get_nom_produit_compose() {
		return $('.nom_produit_compose').text();
	}
	function get_quantite()
	{
		return $('#quantite').val();
	}
	function calculer_prix() {
		var prix=0;
		var component=$('.produit');
		var selections=component.find('.selected');
		selections.each(function (index, element) {
			
			prix+=parseFloat($(this).find('.prix_single').attr('data-prix'));
			
		});
		$('.prix_total strong').text(prix);
		return prix;
	};
	function change_selected(selection) { 
		selection.parent().find('.selected').removeClass('selected');
		selection.children('.option').addClass('selected');
	 };
	function difference_prix(selection) {
		var prix_selectionne=parseFloat(selection.find('.prix_single').attr('data-prix'));
		var div_difference=selection.parent().find('.difference_prix');
		div_difference.each(function(){
			var reste=0;
			var prix=parseFloat($(this).prev().find('.prix_single').attr('data-prix'));
			var prix_final="";
			reste=prix_selectionne-prix;
			
			if(reste > 0)
			{
				prix_final="-"+reste+"TND";
			}
			else if(reste < 0)
			{
				prix_final="+"+reste*(-1)+"TND";
			}
			else
			{
				prix_final="";
			}
			$(this).children('p').text(prix_final);
		});
		
	};

	/* fin composite product*/

	function init() { 
		
		var selections=$('.prix_single');
		init_product_buider();

		$.post("recuperation/add_composite_to_card.php", 
		{
			nom: (selections.attr('data-nom')=='max box')?'max box': '',
			type: selections.attr('data-type')
		},
			function (data, textStatus, jqXHR) {
				//console.log(data);
				selections.each(function (index, element) {
					// element == this
					/*console.log(parseInt($(this).attr('data-id')));
					console.log(data['id_produit']);
					console.log($.inArray(parseInt($(this).attr('data-id')),data['id_produit']));
					console.log('...................');*/
					if( $.inArray(parseInt($(this).attr('data-id')),data['id_produit']) != -1)
					{
						change_selected($(this).parents('.selected_option'));
						difference_prix($(this).parents('.selected_option'));
					}
				});
				calculer_prix();
				
			},
			"json"
		);
		show_mode(virement);
		
	 }

	 /* controle de saisi formulaire panier*/
	 $("#valider_commande").on("click", function (event) {
		event.preventDefault();
		var n=[0,1,2,3,4,5,6,7,8,9];
		var valide=1;
		var inputs=$("input");
		inputs.each(function () {
			// element == this
			var valeur=$(this).val();
			var id=$(this).attr('id');
			var div=$(this).parent().find(".obligatoire");
			var message="";

			if(id == "nom_user_panier" || id == "prenom_user_panier")
			{
				if (valeur.length == 0 || valeur.length >  30) {
					message="ce champ est obligatoire";
					div.css('display','block');
					div.children().text(message);
					$(this).css('border',"3px solid red") ;
					
					valide=0;
				} else {
					for (let j = 0; j < valeur.length; j++) {
						const element = parseInt(valeur[j]);
						var index=$.inArray(element,n);
						if(index!=-1)
						{
							message="ne doit pas contenir de chiffre";
							div.css('display','block');
							div.children().text(message);
							$(this).css('border',"3px solid red") ;	
							valide=0;
							break;
						}
						else
						{
							div.css('display','none');
							$(this).css('border',".5px solid rgba(0,0,0,0.3)");
						}
					}		
				}
			}
			else if( $.inArray(id,[ "ville_user_panier","adresse_user_panier"])!=-1)
			{
				if(valeur.length == 0 || valeur.length > 30)
				{
					if(valeur.length == 0)
					{
						message="ce champ ne doit pas étre vide";
					}
					else
					{
						message="vous avez atteint la taille maximale de caratères";
					}
					div.css('display','block');
					div.children().text(message);
					$(this).css('border',"3px solid red") ;	
					valide=0;
				}
				else
				{
					div.css('display','none');
					$(this).css('border',".5px solid rgba(0,0,0,0.3)");
				}
			}
			else if(id=="code_postal_user_panier")
			{
				if(valeur.length == 0 || valeur.length > 15)
				{
					if(valeur.length == 0)
					{
						message="ce champ ne doit pas étre vide";
					}
					else
					{
						message="vérifier la taille de votre code postal";
					}
					div.css('display','block');
					div.children().text(message);
					$(this).css('border',"3px solid red") ;	
					valide=0;
				}
				else
				{
					div.css('display','none');
					$(this).css('border',".5px solid rgba(0,0,0,0.3)");
				}
			}
			else if(id=="telephone_user_panier")
			{
				if(valeur.length < 8 || valeur.length > 15)
				{
					if(valeur.length == 0)
					{
						message="vérifier que votre numero de téléphone est valide";
					}
					else
					{
						message="vérifier la taille de votre numéro de téléphone";
					}
					div.css('display','block');
					div.children().text(message);
					$(this).css('border',"3px solid red") ;	
					valide=0;
				}
				else
				{
					div.css('display','none');
					$(this).css('border',".5px solid rgba(0,0,0,0.3)");
				}
			}
			else if( id== "email_user_panier")
			{
				var existe = valeur.indexOf("@");
				if (existe == -1 || valeur.indexOf(".", existe) == -1 || valeur[0]=="@") {
					message="Email incorrecte";
					div.css('display','block');
					div.children().text(message);
					$(this).css('border',"3px solid red") ;	
					valide=0;
				} else {
					div.css('display','none');
					$(this).css('border',".5px solid rgba(0,0,0,0.3)");
				}
			}
			else if( id == "condition_panier")
			{
				if(!$(this).prop('checked'))
				{
					message="vous devez lire et accepter les conditions"
					div.css('display','block');
					div.children().text(message);
					$(this).css('border',"3px solid red") ;	
					valide=0;
				}else {
					div.css('display','none');
					$(this).css('border',".5px solid rgba(0,0,0,0.3)");
				}
			}
		});
		if(valide)
		{
			document.forms['formulaire_commande'].submit();
		}
	 });
	
});

