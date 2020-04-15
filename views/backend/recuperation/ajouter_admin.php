<?PHP
include "../../../entities/admin.php";
include "../../../core/admin_core.php";
include "../../../config.php";

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['mot_de_passe']) and isset($_POST['image_profila']))
{
	$lien="http://localhost/sbs/views/images/";
	$image_profila=$lien.$_POST['image_profila'];	
$admin1=new Admin($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mot_de_passe'],$image_profila);
$admin1_core=new Admin_core();
$admin1_core->ajouter_admin($admin1);
header('Location: /sbs/views/backend/utilisateur.php');
	
}else{
	echo "vérifier les champs because ur noob jordy ";
}

?>