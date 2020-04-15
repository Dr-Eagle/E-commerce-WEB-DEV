<?PHP
include "../../../entities/composite_product.php";
include "../../../core/produit_compose_core.php";
include "../../../core/composite_product_core.php";
include "../../../config.php";


$composite_product1=new composite_product_core();

	$composite_product1->supprimer_composite_product($_GET['id_comp']);

    $pc=new Produit_compose_core();
	$pc->update_produit_compose();
    header('Location: /sbs/views/backend/tous_composite_product.php');


?>