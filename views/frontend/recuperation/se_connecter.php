<?php
session_start();
include "../../../core/panier_core.php";
include "../../../config.php";

if(isset($_POST['mot_de_passe']))
{
    $panier=new Panier_core();
    $client=$panier->query("SELECT id_client from client where email=? and mot_de_passe=?",array($_POST['email'],$_POST['mot_de_passe']),"r");
    if(!empty($client))
    {
        $_SESSION['client']=$client[0]->id_client;
        header("Location: ../espace_client.php");
    }
    else
    {
        header("Location: ../formulaire_connexion.php");
    }
}

?>
