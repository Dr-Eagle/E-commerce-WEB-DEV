<?PHP
include "../../../entities/livreur.php";
include "../../../core/livreur_core.php";
include "../../../config.php";
if (isset($_GET['id_liv'])) {
	$livreur_core = new livreur_core();
	$result = $livreur_core->recuperer_livreur($_GET['id_liv']);
		
if (isset($_POST['nom_livreur']) and isset($_POST['prenom_livreur']) and isset($_POST['image_livreur']) and isset($_POST['email_livreur'])and isset($_POST['telephone'])){
	$lien="http://localhost/sbs/views/images/";
	$image_livreur=$lien.$_POST['image_livreur'];
	$livreur1=new livreur($_POST['nom_livreur'],$_POST['prenom_livreur'],$image_livreur,$_POST['email_livreur'],$_POST['telephone']);
	$livreur_core->modifier_livreur($livreur1,$_GET['id_liv']);
	header('Location: /sbs/views/backend/tous_livreurs.php?id_lr=0');
}
}
else{ echo "verifies les champs ";
}

?> 


	
