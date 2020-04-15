<?PHP
include "../../../entities/admin.php";
include "../../../core/admin_core.php";
include "../../../config.php";
if (isset($_GET['id_ad'])) {
	echo"4";
	$admin_core = new Admin_core();
$lien="http://localhost/sbs/views/images/";
	$image_profila=$lien.$_POST['image_profila'];	

if (isset($_POST['image_profila'])) {
	echo "e";
	$admin1=new Admin($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mot_de_passe'],$image_profila);
	$admin_core->modifier_admin($admin1,$_GET['id_ad']);
	//header('Location: /sbs/views/backend/toutes_admins.php');
}
}
else{ echo "verifies les champs ";
}

?> 