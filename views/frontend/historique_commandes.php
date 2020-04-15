<?php
session_start();
    include "include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
    <?php 
    include 'tete.php';
	?>

</head>

<body>
    <div class="super_container">

        <!-- Header -->

        <?php
        include "entete.php";
        ?>
        <!-- header-->

        <!--body-->
        <?php
            $historique_core=new Historique_core();
            $commande=new Commande_core();
            $ids_commande=$historique_core->select_id_order_user();
        ?>
        <div class="container">
            <div class="option_client">
                <br><br>
                <h2>historique de vos commandes</h2>
                <div class="historique_commmande espace_client">
                    <h5>Vos commandes depuis la création de votre compte</h5>
                    <br><br>
                    <table class="table table-striped table-inverse ">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Reference</th>
                                <th>Date</th>
                                <th>Prix Total</th>
                                <th>Paiment</th>
                                <th>Etat</th>
                                <th>Facture</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($ids_commande as $id_commande) {
                                        $commandes_client=$commande->select_order($id_commande->id_commande);
                                        foreach ($commandes_client as $commande_client) {
                                            $panier_client=$panier->get_panier($commande_client->ide_panier);
                                ?>
                                    <tr>
                                        <td scope="row bold"><?= $commande_client->id_commande;?></td>
                                        <td><?= $id_commande->date_commande ;?></td>
                                        <td><?=$panier_client[0]->prix_total ;?>TND</td>
                                        <td><?= $commande_client->mode_paiement;?></td>
                                        <td><?= $commande_client->etat;?></td>
                                        <td> - <a class="details" data-id-commande="<?= $commande_client->id_commande;?>"href="recuperation/details_commande.php?id_commande=<?= $commande_client->id_commande;?>">Details</a></td>
                                     </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                    </table>
                    <div class="modals">
                        <div class="exit">
                            <a href="#"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="modal_content" >

                            <div class="modal_items">
                                <h2>Details de commande</h2>
                                <div class="label">
                                    <label for="">numero de commande</label>
                                    <input type="text" name="" id="id_commande" value=""readonly>
                                </div>
                                <div class="label">
                                    <label for="">Nom et Prenom</label>
                                    <input type="text" name="" id="nom" value="" readonly>
                                </div>
                                
                                <div class="label">
                                    <label for="">adresse de livraison</label>
                                    <input type="text" name="" id="adresse_livraison" value="" readonly>
                                </div>
                                <div class="label">
                                    <label for="">2éme adresse de livraison</label>
                                    <input type="text" name="" id="adresse_livraison_2" value="" readonly>
                                </div>
                                <div class="label">
                                    <label for="">ville</label>
                                    <input type="text" name="" id="ville" value="" readonly>
                                </div>
                                <div class="label">
                                    <label for="">Code postal</label>
                                    <input type="text" name="" id="code_postal" value="" readonly>
                                </div>
                                <div class="label">
                                    <label for="">Date de commande</label>
                                    <input type="text" name="" id="date_commande" value="" readonly>
                                </div>
                                <div class="label">
                                    <label for="">Date de livraison</label>
                                    <input type="text" name="" id="date_livraison" value="" readonly>
                                </div>
                                <h4>Produits</h4>
                                <table class="table table-striped table-inverse ">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Produits</th>
                                            <th>Quantite</th>
                                            <th>Prix Unitaire</th>
                                            <th>Prix Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="produit">

                                    </tbody>
                                    <tfoot id="totaux">
                                        <tr>
                                            <th colspan="3">Sous Total</th>
                                            <th id="total_panier"></th>
                                        </tr>
                                        <tr>
                                            <th>Code Promo</td>
                                            <th id="code_promo"></td>
                                            <th id="pourcentage"></td>
                                            <th id="total_remise"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!--body-->

        <!--footer-->
        <?php
        include "pied.php";
        ?>
        <!--footer-->
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/mustache.js"></script>
    
    <script src="js/controle_formulaire.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/script_additionnel.js"></script>
</body>

</html> 