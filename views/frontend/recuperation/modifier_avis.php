<?PHP
include "../../../entities/avis.php";
include "../../../core/avis_core.php";
include "../../../config.php";
/*if (isset($_GET['id_av'])) {
	$avis_core = new avis_core();
	$result = $avis_core->recuperer_avis($_GET['id_av']);
		
if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['nom_produit']) and isset($_POST['note']) and isset($_POST['email'])){
	
	$avis1=new avis($_POST['nom'],$_POST['prenom'],$_POST['nom_produit'],$_POST['note'],$_POST['email']);
	$avis_core->modifier_avis($avis1,$_GET['id_av']);
	header('Location: /sbs/views/frontend/tout_avis.php');
}
}
else{ echo "verifies les champs ";
}*/
if (isset($_GET['id_av']))
{
	echo "4";
	$avis_core = new Avis_core();
	$avis1=new Avis($_POST['nom'],$_POST['prenom'],$_POST['nom_produit'],$_POST['note'],$_POST['email']);
	$avis_core->modifier_avis($avis1,$_GET['id_av']);
	header('Location: /sbs/views/frontend/tout_avis.php');
}
else
{
	echo "verifier les champs";
}

?> 


	
