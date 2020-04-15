<?php
session_start();
include "../../../core/produit_compose_core.php";
include "../../../core/composite_selection.php";
include "../../../entities/selection_produit_compose.php";
include "../../../core/selection_produit_compose_core.php";
include "../../../core/ligne_panier_core.php";
include "../../../core/panier_core.php";
include "../../../core/code_promo_core.php";
include "../../../core/commande_core.php";
include "../../../core/historique_core.php";
include "../../../config.php";

if(isset($_POST['nom_produit_compose']))
{
    $produit_compose=new Selection_produit_compose_core();
    $donnee=array();
    $ligne=new Ligne_panier_core();
    $panier=new Panier_core();
    $produit_compose->update_quantity($_SESSION['panier'],$_POST['nom_produit_compose'],$_POST['quantite']);

    $quantite=$produit_compose->get_quantite($_SESSION['panier'])[$_POST['nom_produit_compose']];
    $prix_t=$produit_compose->get_prix_produit_compose($_SESSION['panier'])[$_POST['nom_produit_compose']];

    $donnee['quantite_composite']=$quantite;
    $donnee['prix_composite']=$prix_t;
    $donnee['total']=$panier->total_panier($_SESSION['panier']);
    $donnee['quantite']=$panier->count_items($_SESSION['panier']);
    $donnee['total_remise']=$panier->total_discount($_SESSION['panier']);
    echo json_encode($donnee);
}
if(isset($_POST['nom'])) 
{
    $produit_compose=new Produit_compose_core();
    $component=$produit_compose->x_box_default_value($_POST['nom'],$_POST['type']);

    echo json_encode($component);
}
if(isset($_POST['ids_produit']) && isset($_SESSION['panier']))
{
    $selection_produit_compose_core=new Selection_produit_compose_core();
    $donnee=array();
    if($selection_produit_compose_core->existe($_POST['nom_produit_compose'],$_SESSION['panier']))
    {
        $donnee['message']="ce produit déja été ajoute au panier veuillez le consulter pour modifier sa quantite ici";
    }
    else
    {
        foreach ($_POST['ids_produit'] as $id_produit) {
            $selection_produit_compose=new Selection_produit_compose($_POST['nom_produit_compose'],$_SESSION['panier'],$id_produit,1);
            $selection_produit_compose_core->add_selection($selection_produit_compose);
        }
        $donnee['message']=$_POST['nom_produit_compose']." a été ajouté à votre panier avec succès ";
    }
    echo json_encode($donnee);
}

?>