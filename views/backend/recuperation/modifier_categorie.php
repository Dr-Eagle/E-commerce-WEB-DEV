<?PHP
include "../../../entities/categorie.php";
include "../../../core/categorie_core.php";
include "../../../config.php";
if (isset($_GET['id_cat'])) {
	$categorie_core = new Categorie_core();
	$result = $categorie_core->recuperer_categorie($_GET['id_cat']);

if (isset($_POST['nom_categorie']) and ($_POST['lien_categorie'])) {
	$categorie = new Categorie($_POST['nom_categorie'], $_POST['lien_categorie']);
	$categorie_core->modifier_categorie($categorie,$_GET['id_cat']);
	header('Location: /sbs/views/backend/toutes_categories.php');
}
}
else{ echo "verifies les champs ";
}

?> 