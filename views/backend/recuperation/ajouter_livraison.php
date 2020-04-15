<?php
include "../../../entities/livraison.php";
include "../../../core/livraison_core.php";
include "D:/wamp64/www/SBS/core/livreur_core.php";
include "../../../config.php";

if (isset($_POST['ide_facture']) and isset($_POST['nom_livreur']) and isset($_POST['etat']))
{
echo "ff";
$livreur1 = new Livreur_core();
$livreur = $livreur1->affiche_livreur();
foreach($livreur as $li){
if($li['nom_livreur']==$_POST['nom_livreur']){
$livraison1=new livraison($_POST['ide_facture'],$li['id_livreur'],$_POST['etat']);

$livraison1_Core=new livraison_core();
$livraison1_Core->ajouter_livraison($livraison1);

header('Location: /sbs/views/backend/tous_livraisons.php?id_lvr=0');
}
}
}
else{
	echo "vérifier les champs";
}
?>