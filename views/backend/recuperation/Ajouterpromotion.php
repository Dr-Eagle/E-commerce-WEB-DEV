<?PHP
include "../../../entities/promotion.php";
include "../../../core/promo_core.php";
include "../../../config.php";

if (isset($_POST['idpro']) and isset($_POST['reduction']) )

//if (isset($_POST['Ajouter']))
{  
	/*echo ($_POST['id']) ; 
	echo ($_POST['nom']) ;
	echo ($_POST['type']) ;
	echo ($_POST['validite']) ;
	echo ($_POST['validite2']) ;
	echo ($_POST['description_detaillee']);
	echo ($_POST['image_event']); */
	//echo $image_event;
	$promotion= new promotion($_POST['idpro'],$_POST['reduction'], ($_POST['dated']),($_POST['datef']));
	$evenement1_core = new promo_core();
	$evenement1_core->ajouter_promotion($promotion);
	//$evenement1_core->afficher_evenement($evenement1);

	header('Location: /SBS/views/backend/afficherpromotion.php');
} else {
    echo "vérifier les champs";
}


 ?>