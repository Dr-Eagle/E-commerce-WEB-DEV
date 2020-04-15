<?PHP
include "../../../entities/livraison.php";
include "../../../core/livraison_core.php";
include "../../../config.php";



$livraison_core1=new livraison_core();
$livraison=$livraison_core1->affiche_livraison();

foreach($livraison as $va)
{
	if($va['id_livraison']==$_GET['id_liv'])
	{
	$livraison_core1->supprimer_livraison($va['id_livraison']);
	header('Location: /sbs/views/backend/tous_livraisons.php?id_lvr=0');
	}
}
    
   

?>