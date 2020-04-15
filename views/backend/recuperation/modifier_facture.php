<?PHP
include "../../../entities/facture.php";
include "../../../core/facture_core.php";
include "../../../config.php";
if (isset($_GET['id_fac'])) {
	$facture_core = new facture_core();

if (isset($_POST['ide_commande'])) {
	$facture = new facture($_POST['ide_commande']);
	$facture_core->modifier_facture($facture,$_GET['id_fac']);
	header('Location: /sbs/views/backend/toutes_factures.php');
}
}
else{ echo "verifies les champs ";
}

?> 