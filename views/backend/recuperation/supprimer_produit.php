<?PHP
include "../../../entities/produit.php";
include "../../../core/produit_compose_core.php";
include "../../../core/produit_core.php";
include "../../../config.php";


$produit1=new Produit_core();

	$produit1->supprimer_produit($_GET['id_po']);
    $pc=new Produit_compose_core();
	$pc->update_produit_compose();

    header('Location: /sbs/views/backend/tous_produits.php');


?>