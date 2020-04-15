<?PHP
include "../../../entities/livreur.php";
include "../../../core/livreur_core.php";
include "../../../config.php";

if (isset($_POST['nom_livreur']) and isset($_POST['prenom_livreur']) and isset($_POST['image_livreur']) and isset($_POST['email_livreur'])and isset($_POST['telephone'])){

	$lien="http://localhost/sbs/views/images/";
	$image_livreur=$lien.$_POST['image_livreur'];	
$livreur1=new livreur($_POST['nom_livreur'],$_POST['prenom_livreur'],$image_livreur,$_POST['email_livreur'],$_POST['telephone']);

$livreur1_core=new Livreur_core();
$livreur1_core->afficher_livreur($livreur1);
$livreur1_core->ajouter_livreur($livreur1);

header('Location: /sbs/views/backend/tous_livreurs.php?id_lr=0');

	
}else{
	echo "vérifier les champs";
}
?>