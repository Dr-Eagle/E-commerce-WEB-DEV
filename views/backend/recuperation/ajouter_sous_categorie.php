<?PHP
include "../../../entities/sous_categorie.php";
include "../../../core/sous_categorie_core.php";
include "../../../config.php";

if (isset($_POST['nom_sous_categorie'])and isset($_POST['lien_sous_categorie']) and isset($_POST['ide_categorie']))
{
	if(($_POST['nom_sous_categorie'])!='' and ($_POST['lien_sous_categorie']) and ($_POST['ide_categorie'])!='')
	{
$sous_categorie1=new Sous_categorie($_POST['nom_sous_categorie'],$_POST['lien_sous_categorie'], $_POST['ide_categorie']);

$sous_categorie1_Core=new Sous_categorie_core();
$sous_categorie1_Core->ajouter_sous_categorie($sous_categorie1);

header('Location: /sbs/views/backend/toutes_categories.php');
	}
}
else{
	echo "vérifier les champs";
}


?>