<?PHP
include "../../../core/produit_compose_core.php";
include "../../../entities/produit.php";
include "../../../core/produit_core.php";
include "../../../config.php";

if (isset($_POST['prix']) and isset($_POST['quantite']) and isset($_POST['nom_produit']) and isset($_POST['image_produit']) and isset($_POST['max_box']) and isset($_POST['game_box']) and isset($_POST['description_courte']) and isset($_POST['description_detaillee']) and isset($_POST['nom_sous_categorie']))
{
	$lien="http://localhost/sbs/views/images/";
	$image_produit=$lien.$_POST['image_produit'];
	echo $image_produit;
	$produit1 = new Produit($_POST['prix'], $_POST['quantite'], $_POST['nom_produit'], $image_produit, $_POST['max_box'], $_POST['game_box'], $_POST['description_courte'], $_POST['description_detaillee'], $_POST['nom_sous_categorie']);
	$produit1_core = new Produit_core();
	$produit1_core->ajouter_produit($produit1);
	$produit1_core->afficher_produit($produit1);

	$pc=new Produit_compose_core();
	$pc->update_produit_compose();

	header('Location: /sbs/views/backend/tous_produits.php');
} else {
    echo "vérifier les champs";
}


 ?>