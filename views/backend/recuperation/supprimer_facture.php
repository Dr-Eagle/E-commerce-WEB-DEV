<?PHP
include "../../../entities/facture.php";
include "../../../core/facture_core.php";
include "../../../config.php";



$facture_core1=new facture_core();
$facture=$facture_core1->affiche_facture();

foreach($facture as $va)
{
	if($va['id_facture']==$_GET['id_fac'])
	{
	$facture_core1->supprimer_facture($va['id_facture']);
	header('Location: /sbs/views/backend/factures.php?id_fac=0');	
	}
}
    
   

?>