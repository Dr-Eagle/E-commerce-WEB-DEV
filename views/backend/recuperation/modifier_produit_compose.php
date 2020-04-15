<?PHP
include "../../../entities/produit_compose.php";
include "../../../core/produit_compose_core.php";
include "../../../config.php";
if (isset($_GET['id_comp'])) {
	$lien="http://localhost/sbs/views/images/";
	$image_produit_compose=$lien.$_POST['image_produit_compose'];
		if (isset($_POST['nom_produit_compose']) and isset($_POST['image_produit_compose'])and isset($_POST['description_produit_compose'])and isset($_POST['prix_produit_compose'])) {
		$produit_compose1=new produit_compose($_POST['nom_produit_compose'],$image_produit_compose,$_POST['description_produit_compose'],$_POST['prix_produit_compose']);
		$produit_compose1_Core=new produit_compose_core();
		$produit_compose1_Core->modifier_produit_compose($produit_compose1,$_GET['id_comp']);
		$pc=new Produit_compose_core();
		$pc->update_produit_compose();
		header('Location: /sbs/views/backend/tous_produit_compose.php');
}
}
else{ echo "verifies les champs ";
}

?> 