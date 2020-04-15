<?php
session_start();
include "../../../core/livraison_core.php";
include "../../../core/livreur_core.php";

include "../../../config.php";

if(isset($_GET['stat']))
{
    
    $livreur1=new Livreur_core();
    $tab=$livreur1->stat_order_product();
    

    echo json_encode($tab);
}



?>

