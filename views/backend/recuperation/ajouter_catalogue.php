<?PHP
include "../../../entities/catalogue.php";
include "../../../core/catalogue_core.php";
include "../../../config.php";

if (isset($_POST['image_principale'])){
$lien="http://localhost/sbs/views/images/";
$image_principale=$lien.$_POST['image_principale'];
$image_2=$lien.$_POST['image_2'];
$image_3=$lien.$_POST['image_3'];
$image_description=$lien.$_POST['image_description'];
$catalogue1=new Catalogue($image_principale,$image_2,$image_3,$image_description,$_GET['id_produit']);

$catalogue1_core=new catalogue_core();
$catalogue1_core->afficher_catalogue($catalogue1);
$catalogue1_core->ajouter_catalogue($catalogue1);

header('Location: /sbs/views/backend/tous_produits.php');
	
}else{
	echo "vérifier les champs";
}
?>