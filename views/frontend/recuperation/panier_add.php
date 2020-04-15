<?PHP
session_start();
include "../../../core/panier_core.php";
include "../../../core/composite_selection.php";
include "../../../core/ligne_panier_core.php";
include "../../../entities/ligne_panier.php";
include "../../../core/selection_produit_compose_core.php";
include "../../../config.php";


	if(isset($_POST['id_ligne']) and isset($_POST['quantite']))
	{
		$donnee=array();
		$ligne=new Ligne_panier_core();
		$panier=new Panier_core();
		$ligne->update_items_number($_POST['id_ligne'],$_POST['quantite']);
		$donnee['total_ligne']=$ligne->update_price_line_cart($_POST['id_ligne']);
		$donnee['total']=$panier->total_panier($_SESSION['panier']);
		$donnee['quantite']=$panier->count_items($_SESSION['panier']);
		$donnee['total_remise']=$panier->total_discount($_SESSION['panier']);
		echo json_encode($donnee);
	}
	
    if(isset($_GET['id_produit']))
    {   
		$donnee=array();
		$panier=new Panier_core();
		if(!$panier->add_cart($_GET['id_produit']))
		{
			$donnee['erreur']="le produit séléctionné est hors stock";
		}
		$donnee['total']=$panier->total_panier($_SESSION['panier']);
		$donnee['quantite']=$panier->count_items($_SESSION['panier']);

		echo json_encode($donnee);
    }
	
		
 ?>