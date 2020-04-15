<?PHP
include "../../../entities/catalogue.php";
include "../../../core/catalogue_core.php";
include "../../../config.php";

echo $_GET['id_por'];
$catalogue1=new Catalogue_core();
$catalogue=$catalogue1->affiche_catalogue();
foreach($catalogue as $vak){
	if($vak['ide_produit']==$_GET['id_por']){
		$catalogue1->supprimer_catalogue($vak['id_catalogue']);
	}
}
				header('Location: /sbs/views/backend/tous_produits.php');
	?>