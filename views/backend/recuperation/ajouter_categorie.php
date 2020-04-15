<?php
include "../../../entities/categorie.php";
include "../../../core/categorie_core.php";
include "../../../config.php";

if (isset($_POST['nom_categorie']) and isset($_POST['lien_categorie']))
{
$categorie1=new Categorie($_POST['nom_categorie'],$_POST['lien_categorie']);

$categorie1_Core=new Categorie_core();
$categorie1_Core->ajouter_categorie($categorie1);
header('Location: /sbs/views/backend/toutes_categories.php');	
}
else{
	echo "vérifier les champs";
}
?>