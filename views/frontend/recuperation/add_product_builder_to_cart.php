<?php
session_start();
include "../../../core/produit_compose_core.php";
include "../../../core/composite_selection.php";
include "../../../core/selection_produit_compose_core.php";
include "../../../core/ligne_panier_core.php";
include "../../../core/panier_core.php";
include "../../../core/code_promo_core.php";
include "../../../core/commande_core.php";
include "../../../core/historique_core.php";
include "../../../config.php";

$composite_selection=new Composite_selection();


if(isset($_SESSION['panier']) && isset($_GET['id_produit']))
{
    $_SESSION['builder'][$_GET['id_sc']]=intval($_GET['id_produit'],10);


    if(empty($_SESSION['builder']))
    {
        
        $produits=$composite_selection->recuperer_produit_selectionne($_SESSION['panier']);
    }
    else
    {
        $produits=$composite_selection->recuperer_produit_selectionne_temp($_SESSION['builder']);
    }
    
    echo json_encode($produits);
}

if(isset($_SESSION['panier']) && isset($_GET['id_delete']))
{
    
    if(empty($_SESSION['builder']))
    {
        $produits=$composite_selection->recuperer_produit_selectionne($_SESSION['panier']);
        $composite_selection->supprimer($_GET['id_delete'],$_SESSION['panier']);
    }
    else
    {
        unset($_SESSION['builder'][intval($_GET['id_delete'],10)]);
        $produits=$composite_selection->recuperer_produit_selectionne_temp($_SESSION['builder']);
    }

    echo json_encode($produits);
}
if(isset($_GET['add_to_cart']))
{
    $panier=new Panier_core();
    $donnee=array();
    $composite_selection->supprimer_old_product_builder($_SESSION['panier']);
    foreach ($_SESSION['builder'] as $id_sc => $id_produit) {
        $composite_selection->ajouter($id_produit,$id_sc,$_SESSION['panier']);
    }
    
    $donnee['total']=$panier->total_panier($_SESSION['panier']);
    $donnee['quantite']=$panier->count_items($_SESSION['panier']);
    
    echo json_encode($donnee);
}
if(isset($_SESSION['panier']) && isset($_GET['init']))
{
    if(empty($_SESSION['builder']))
    {
        $produits=$composite_selection->recuperer_produit_selectionne($_SESSION['panier']);
    }
    else
    {
        $produits=$composite_selection->recuperer_produit_selectionne_temp($_SESSION['builder']);
    }
    
    echo json_encode($produits);
}

?>