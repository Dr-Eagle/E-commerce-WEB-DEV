<?PHP
include "../../../entities/produit_compose.php";
include "../../../core/produit_compose_core.php";
include "../../../core/produit_compose_core.php";
include "../../../config.php";



$produit_compose_core1=new produit_compose_core();
$produit_compose=$produit_compose_core1->affiche_produit_compose();

foreach($produit_compose as $va)
{
	if($va['id_produit_compose']==$_GET['id_proCom'])
	{
	$produit_compose_core1->supprimer_produit_compose($va['id_produit_compose']);
	$pc=new Produit_compose_core();
	$pc->update_produit_compose();
	
	}
}
header('Location: /sbs/views/backend/tous_produit_compose.php');	
    
   

?>