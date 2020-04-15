<?php
session_start();
include "../../../core/ligne_panier_core.php";
include "../../../core/panier_core.php";
include "../../../core/code_promo_core.php";
include "../../../core/commande_core.php";
include "../../../core/historique_core.php";
include "../../../entities/commande.php";
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
$output='';
//if(isset($_POST['interval']))
{
	$commande=new Commande_core();
	
    $groupe_commande = $commande->get_orders(1,5);
   
	
	foreach ($groupe_commande as $key => $commande) {
	# code...

		foreach ($commande as $com){
			if($com->etat=="validée")
			{
				$option='<a href="recuperation/modifier_etat_commande.php?id_com= '.$com->id_commande.'&statut=annulée "> Annuler</a>';
			}
			else if($com->etat=="annulée")
			{
				$option='<a href="recuperation/modifier_etat_commande.php?id_com='.$com->id_commande.'&statut=validée ">Valider</a>';
			}
			else
			{
				$option='<a href="recuperation/modifier_etat_commande.php?id_com= '.$com->id_commande.'&statut=annulée "> Annuler</a>
						<span> | </span>
						<a href="recuperation/modifier_etat_commande.php?id_com='.$com->id_commande.'&statut=validée ">Valider</a>';
			}
			
		$output .='
			<tr>
				<td scope="row" class="coche"><input type="checkbox" name="" id="">
				</td>
				<td>
					<h4>
						 '.$com->id_commande.'
					</h4>
					<div class="option_produit valider_commande">
						'.$option.'
					</div>
				</td>
				<td>
					 '.$com->nom_client.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 '.$com->prenom_client.'
				</td>
				<td>
					 '.$com->ville.'
				</td>
				<td>
					 '.$com->adresse_livraison.'
				</td>
				<td>
					 '.$com->etat.'
				</td>
				<td>
					 '.$com->telephone.'
				</td>
				<td>
					 '.$com->mode_paiement.'
				</td>
			</tr>
			<div class="navigation">
				<button type="submit" id="precedent" data-valeur="0" data-link="recuperation/filtrer_commandes.php">
				<</button> <span>---</span>
					<button type="submit" id="suivant" data-valeur="5" data-link="recuperation/filtrer_commandes.php">></button>
					<div class="clear"></div>
			</div>
			
			
			';

		}
	}

}
	

    echo $output;




?>