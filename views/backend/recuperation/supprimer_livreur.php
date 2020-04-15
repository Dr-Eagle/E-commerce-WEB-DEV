<?PHP
include "../../../entities/livreur.php";
include "../../../core/livreur_core.php";
include "../../../config.php";



$livreur_core1=new livreur_core();
$livreur=$livreur_core1->affiche_livreur();

foreach($livreur as $val)
{
	if($val['id_livreur']==$_GET['id_li'])
	{
	$livreur_core1->supprimer_livreur($val['id_livreur']);
	header('Location: /sbs/views/backend/tous_livreurs.php?id_lr=0');

	}
}
    
   

?>