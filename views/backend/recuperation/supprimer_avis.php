<?PHP
include "../../../entities/avis.php";
include "../../../core/avis_core.php";
include "../../../config.php";



$avis_core1=new Avis_core();
$avis=$avis_core1->affiche_avis();

foreach($avis as $av)
{
	if($av['id_avis']==$_GET['id_avis'])
	{
	$avis_core1->supprimer_avis($av['id_avis']);
	header('Location: \SBS\views\backend\tout_avis.php');
	}
}
    
   

?>