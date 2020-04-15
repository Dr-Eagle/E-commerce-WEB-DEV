<?PHP
include "../../../entities/livraison.php";
include "../../../core/livraison_core.php";
include "D:/wamp64/www/SBS/core/livreur_core.php";
include "../../../config.php";
if (isset($_GET['id_liv'])) {
	$livraison_core = new livraison_core();

if (isset($_POST['ide_facture']) and ($_POST['nom_livreur']) and isset($_POST['etat'])) {
$livreur1 = new Livreur_core();
$livreur = $livreur1->affiche_livreur();
foreach($livreur as $li){
if($li['nom_livreur']==$_POST['nom_livreur']){
	$livraison = new livraison($_POST['ide_facture'], $li['id_livreur'],$_POST['etat']);
	$livraison_core->modifier_livraison($livraison,$_GET['id_liv']);
	header('Location: /sbs/views/backend/tous_livraisons.php?id_lvr=0');
	}
}
}
}
else{ echo "verifies les champs ";
}

?> 