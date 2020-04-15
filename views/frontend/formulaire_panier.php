<?php
session_start();
    include "include.php";
?>
<?php
    $panier=new Panier_core();
    if(isset($_SESSION['panier'])) 
    {
        if(!isset($_SESSION['client']))
        {
            header('Location: /SBS/views/frontend/formulaire_connexion.php');
        }
        if( $panier->count_items($_SESSION['panier'])==0)
        {
            header('Location: /SBS/views/frontend/index.php');
        }
    }
    if(isset($_SESSION['client']))
    {
        $client_c=$panier->get_user($_SESSION['client']); 
    }
    
?>
<?php
    if(isset($_GET['cancel_code']))
    {
       
        $panier->set_ide_code($_SESSION['panier'],NULL);
    }
    $commande=new Commande_core();
	$commande->commander($panier);

    
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

        <div class="formulaire_panier">
            <div class="container">
                <form action="formulaire_panier.php" method="post" name="formulaire_commande">
                    <div class="row">
                        <div class="col-8">
                            <div class="formulaire">
                                <h3>Details de facturation</h3>
                                <div class="row ligne">
                                    <div class="col-6">
                                        <label>Nom</label>
                                        <input type="text" id="nom_user_panier" name="nom" value="<?= (!empty($client))? $client_c[0]->nom : "";?>">
                                        <div class=" obligatoire" id="nom_user_panier1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Prenom</label>
                                        <input type="text" id="prenom_user_panier" name="prenom" value="<?= (!empty($client))? $client_c[0]->prenom : "";?>">
                                        <div class=" obligatoire" id="prenom_user_panier1" >
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Nom de l entreprise</label>
                                    <input type="text" id="entreprise_user_panier" name="entreprise">
                                </div>
                                <div class="row ligne">
                                    <label>Pays</label>
                                    <input type="text" id="pays_user_panier" value="Tunisie" disabled>
                                </div>
                                <div class="row ligne">
                                    <label>ville </label>
                                    <input type="text" id="ville_user_panier" name="ville">
                                    <div class=" obligatoire" id="ville_user_panier1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Code postal</label>
                                    <input type="number" min="0" id="code_postal_user_panier" name="code_postal">
                                    <div class=" obligatoire" id="code_postal_user_panier1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Adresse</label>
                                    <input type="text" id="adresse_user_panier" name="adresse_livraison">
                                    <div class=" obligatoire" id="adresse_user_panier1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Telephone</label>
                                    <input type="number" min="0" id="telephone_user_panier" name="telephone">
                                    <div class=" obligatoire" id="telephone_user_panier1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Email</label>
                                    <input type="text" id="email_user_panier"  name="email" value="<?= (!empty($client))? $client_c[0]->email : "";?>">
                                    <div class=" obligatoire" id="email_user_panier1">
                                        <p>Email incorrect</p>
                                    </div>
                                </div>
                                <h3>Details de livraison</h3>
                                <div class="row ligne">
                                    <input type="checkbox" id="autre_adresse_user_panier">
                                    <label class="condition">Expédier à une autre adresse ?</label>
                                </div>
                                <div class="row ligne" style="display:none;">
                                    <label>Adresse</label>
                                    <input type="text" id="" name="adresse_livraison_2">
                                </div>
                                <div class="row ligne">
                                    <label class="condition">Notes de Commande</label>
                                    <textarea id="note_commande_user_panier" name="details_commande"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="commande">
                                    <h3>Commande</h3>
                                    <table class="table table-striped table-inverse">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th style="width:70%;">Produit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $elements = $panier->get_element_card($_SESSION['panier']); ?>
                                        <?php for ($i=0; $i < count($elements['produits_simple']['lignes']) ; $i++) : ?>
									
									    <?php ?>
                                            <tr>
                                                <td scope="row"><?= $elements['produits_simple']['produits'][$i]->nom_produit."  *   (".$elements['produits_simple']['lignes'][$i]->quantite.")";?></td>
                                                <td><?= $elements['produits_simple']['lignes'][$i]->prix_ligne;?> TND</td>
                                            </tr>
                                        <?php endfor?>
                                        <?php foreach ($elements['produits_compose'] as $nom_produit_compose => $produits) :?>
                                            <?php 
                                                $single_produit_compose=$selection_produit_compose->get_single_produit_compose( $nom_produit_compose,$_SESSION['panier']);
                                                $prix=$selection_produit_compose->get_prix_unique($_SESSION['panier'],$nom_produit_compose);
                                                $quantite=$selection_produit_compose->get_quantite($_SESSION['panier'])[$nom_produit_compose];
                                                $prix_t=$selection_produit_compose->get_prix_produit_compose($_SESSION['panier'])[$nom_produit_compose];
                                            ?>
                                            <tr>
                                                <td scope="row"><?= $nom_produit_compose."  *   (".$quantite.")";?></td>
                                                <td><?= $prix_t;?> TND</td>
                                            </tr>
                                        <?php endforeach?>
                                        </tbody>
                                        <tfoot>
                                        <?php $codes=$panier->get_pourcentage($_SESSION['panier']);?>
                                            <tr>
                                                <td>Total</td>
                                                <td><?= $panier->total_panier($_SESSION['panier']);?> TND</td>
                                            </tr>
                                        <?php foreach($codes as $code):?>
                                            <tr>
                                                <td>réduction <strong>(-<?= $code->pourcentage?>%)</strong></td>
                                                <td><a href="formulaire_panier.php?cancel_code=Code_promo;?>">Annuler</a></td>
                                            </tr>
                                            <tr>
                                                <td>Total à payer</td>
                                                <td><?= $panier->total_discount($_SESSION['panier']);?> TND</td>
                                            </tr>
                                        <?php endforeach?>
                                            
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="paymant">
                                    <h3>Mode de paiment</h3>
                                    <div class="row mode_paymant ">
                                        <div class="mode ">
                                            <input type="radio" id="virement_user_panier" name="mode_paiement" value="virement"checked />
                                            <label class="condition">Virement Bancaire</label>
                                        </div>
                                        <div class="description_mode">
                                            <p>Effectuez le paiement directement depuis votre compte bancaire. Veuillez utiliser l’ID de votre commande
                                                comme
                                                référence du paiement. Votre commande ne sera pas expédiée tant que les fonds ne seront pas reçus.</p>
                                        </div>
                                    </div>
                                    <div class="row mode_paymant">
                                        <div class="mode">
                                            <input type="radio" id="paymant_user_panier" name="mode_paiement" value="livraison"/>
                                            <label class="condition">Paymant à la livraison</label>
                                        </div>
                                        <div class="description_mode">
                                            <p>Payer en argent comptant à la livraison.</p>
                                        </div>
                                    </div>
                                    <div class="row mode_paymant">
                                        <div class="mode">
                                            <input type="radio" id="paymant_ligne_user_panier" name="mode_paiement" value="payment en ligne"/>
                                            <label class="condition">Paymant en ligne</label>
                                        </div>
                                        <div class="description_mode">
                                            <p>Payer en ligne grace à un compte Paypal.</p>
                                        </div>
                                    </div>
                                    <div class="row mode_paymant">

                                        <div class="description_mode" style="background-color: transparent;margin-top: 10px;margin-bottom:0 ; padding-bottom: 0;">
                                            <p>Vos données personnelles seront utilisées pour le traitement de votre commande, vous accompagner au cours
                                                de votre
                                                visite du site web, et pour d’autres raisons décrites dans notre politique de confidentialité.</p>
                                        </div>
                                    </div>
                                    <div class="row condition_generale">
                                        <input type="checkbox" id="condition_panier">
                                        <label class="condition">J'ai lu et j'accepte les <a href="#">conditions générales</a></label>
                                        <div class="obligatoire" id="condition_panier1">
                                            <p>vous devez accepter les conditioins</p>
                                        </div>
                                    </div>
                                    <div class="valider_commande">
                                        <input type="button" id="valider_commande"  value="Commander">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--footer-->
        <?php
        include "pied.php";
        ?>
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
    <script src="js/custom.js"></script>
    <script src="js/controle_formulaire.js"></script>
    <script src="js/script_additionnel.js"></script>
</body>

</html> 