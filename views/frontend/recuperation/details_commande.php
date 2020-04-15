<?php
session_start();
include "../../../core/ligne_panier_core.php";
include "../../../core/composite_selection.php";
include "../../../core/selection_produit_compose_core.php";
include "../../../core/panier_core.php";
include "../../../core/code_promo_core.php";
include "../../../core/commande_core.php";
include "../../../core/historique_core.php";
include "../../../config.php";

if(isset($_GET['id_commande']))
{
    $commande=new Commande_core();
    $panier=new Panier_core();
    $ligne_panier=new Ligne_panier_core();
    $historique=new Historique_core();
    $code_promo=new Code_promo_core();
    $select_produit_compose=new Selection_produit_compose_core();
    $date=$historique->select_id_order_user();
    $commande_client=$commande->select_order($_GET['id_commande']);
    $panier_client=$panier->get_panier($commande_client[0]->ide_panier);
    $lignes=$ligne_panier->recuperer_Ligne_panier($commande_client[0]->ide_panier);
    $code=$code_promo->get_code_promo("",$panier_client[0]->ide_code);
    $prod=array("nom_produit"=>array(),"prix"=>array());
    foreach ($lignes as $ligne) {
        $produit=$panier->query("SELECT nom_produit,prix from produit where id_produit=?",array($ligne->ide_produit),"ret");
        array_push($prod['nom_produit'],$produit[0]->nom_produit);
        array_push($prod['prix'],$produit[0]->prix);
    }
    $produit_compose=$select_produit_compose->get_selected_product($commande_client[0]->ide_panier);
    $quantite=$select_produit_compose->get_quantite($commande_client[0]->ide_panier);
    
    $prix=$select_produit_compose->get_prix_produit_compose($commande_client[0]->ide_panier);
    $nom_produit_composes=array();
    $quantite_produit_compose=array();
    $prix_produit_compose=array();
    foreach ($produit_compose as $nom_produit_compose => $produit_compose) {
        array_push($nom_produit_composes,$nom_produit_compose);
        array_push($quantite_produit_compose,$quantite[$nom_produit_compose]);
        array_push($prix_produit_compose,$prix[$nom_produit_compose]);
    }
    if(empty($code))
    {
        $data=array("produit_compose"=>array("nom"=>$nom_produit_composes,"quantite"=>$quantite_produit_compose,"prix"=>$prix_produit_compose),"commande"=>$commande_client[0],"panier"=>$panier_client[0],"ligne_panier"=>$lignes,"date"=>$date[0]->date_commande,"total_paye"=>$panier->total_discount($commande_client[0]->ide_panier),"produit"=>$prod);
    }
    else
    {
        $data=array("produit_composite"=>array("produit"=>$produit_compose,"quantite"=>$quantite,"prix"=>$prix),"commande"=>$commande_client[0],"panier"=>$panier_client[0],"ligne_panier"=>$lignes,"date"=>$date[0]->date_commande,"code_promo"=>$code[0],"total_paye"=>$panier->total_discount($commande_client[0]->ide_panier),"produit"=>$prod);
    }
   

    echo json_encode($data);
}



?>

