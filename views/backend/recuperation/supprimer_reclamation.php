<?PHP
include "../../../entities/reclamation.php";
include "../../../core/reclamation_core.php";
include "../../../config.php";



$reclamation_core1=new Reclamation_core();
$reclamation=$reclamation_core1->affiche_reclamation();

foreach($reclamation as $rec)
{
	if($rec['id_reclamation']==$_GET['id_reclamation'])
	{
	$reclamation_core1->supprimer_reclamation($rec['id_reclamation']);
	header('Location: \SBS\views\backend\tout_reclamations.php');
	}
}
    
   

?>