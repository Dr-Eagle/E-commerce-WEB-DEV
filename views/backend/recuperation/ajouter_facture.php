<?php
include "../../../entities/facture.php";
include "../../../core/facture_core.php";
include "../../../config.php";

if (isset($_POST['ide_commande']))
{
$facture1=new facture($_POST['ide_commande']);

$facture1_Core=new facture_core();
$facture1_Core->ajouter_facture($facture1);
header('Location: /sbs/views/backend/factures.php?id_fac=0');
}
else{
	echo "vérifier les champs";
}
?>