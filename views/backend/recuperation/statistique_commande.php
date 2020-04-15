<?php
session_start();
include "../../../core/ligne_panier_core.php";
include "../../../core/panier_core.php";
include "../../../core/code_promo_core.php";
include "../../../core/commande_core.php";
include "../../../core/historique_core.php";
include "../../../config.php";

if(isset($_POST['nbre_elements']))
{
    
    $commande=new Commande_core();
    $tab=$commande->stat_order_product($_POST['nbre_elements']);
    

    echo json_encode($tab);
}



?>

