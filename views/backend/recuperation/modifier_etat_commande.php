<?PHP
include "../../../entities/commande.php";
include "../../../core/commande_core.php";
include "../../../core/sendmail.php";
include "../../../config.php";


if(isset($_GET['statut']) and isset($_GET['id_com'])){
	$mail=new Sendmail();
	$commande1 = new Commande_core();
	$commande=$commande1->select_order($_GET['id_com']);
	
	if($_GET['statut']==="annulée"){
		$commande1->modify_order_status($_GET['id_com'],"annulée"); 
		$mail->sendmail_annulation($commande[0]->email,"Annulation de commande",$commande[0]->nom_client.' '.$commande[0]->prenom_client,$commande[0]);
	}
	else if($_GET['statut']==="validée"){
		$commande1->modify_order_status($_GET['id_com'],"validée"); 
		$mail->sendmail_validation($commande[0]->email,"Validation de commande",$commande[0]->nom_client.' '.$commande[0]->prenom_client,$commande[0]);
	}
	
}

header('Location: /sbs/views/backend/commandes.php');


?> 