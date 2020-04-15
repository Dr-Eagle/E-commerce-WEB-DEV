<?PHP
include "../../../entities/sous_categorie.php";
include "../../../core/sous_categorie_core.php";
include "../../../config.php";
if (isset($_GET['id_sous_cat'])){
	$sous_categorie_core=new Sous_categorie_core();
	$result=$sous_categorie_core->recuperer_sous_categorie($_GET['id_sous_cat']);

if (isset($_POST['nom_sous_categorie']) and  ($_POST['lien_sous_categorie']) and ($_POST['ide_categorie'])){
	$sous_categorie1=new Sous_categorie($_POST['nom_sous_categorie'],$_POST['lien_sous_categorie'], $_POST['ide_categorie']);
	
	$sous_categorie_core->modifier_sous_categorie($sous_categorie1,$_GET['id_sous_cat']);
	header('Location: /sbs/views/backend/toutes_categories.php');
}
}
else{
	echo "no";
}
?>