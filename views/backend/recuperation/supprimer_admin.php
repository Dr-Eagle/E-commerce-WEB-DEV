<?PHP
include "../../../entities/admin.php";
include "../../../core/admin_core.php";
include "../../../config.php";



$admin_core1=new Admin_core();
$admin=$admin_core1->affiche_admin();

foreach($admin as $vala)
{
	if($vala['id_admin']==$_GET['id_ad'])
	{
	$admin_core1->supprimer_admin($vala['id_admin']);
	header('Location: /sbs/views/backend/utilisateur.php');
	}
}
    
   

?>