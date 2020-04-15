<?php
session_start();
include "include.php";
?>
<?php
$product_builder=new Composite_selection();
    if(isset($_GET["id_del"]))
	{
        $ligne_panier_core = new Ligne_panier_core();
		$ligne_panier_core->delete_line($_GET["id_del"]);
    }
    if(isset($_GET['nom_produit_del']))
    {
        $produit_comp=new Selection_produit_compose_core();
        $produit_comp->delete_selection($_SESSION['panier'],$_GET['nom_produit_del']);
    }
    if(isset($_GET['builder_del']))
    {
        $product_builder->supprimer_product_builder($_GET['builder_del']);
    }
    
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
        
        <!-- Cart -->

        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_title">Votre Panier</div>
                            <table class="table table-striped table-inverse ">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Quantite</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $elements = $panier->get_element_card($_SESSION['panier']);?>
                                    <?php for ($i=0; $i < count($elements['produits_simple']['lignes']) ; $i++) : ?>
									
									<?php ?>
                                    <tr>
                                        <td scope="row"><a href="cart.php?id_del=<?= $elements['produits_simple']['lignes'][$i]->id_ligne ;?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                        <td><img src="<?= $elements['produits_simple']['produits'][$i]->image_produit;?>" alt="image"></td>
                                        <td> <?=$elements['produits_simple']['produits'][$i]->nom_produit;?></td>
                                        <td><?= $elements['produits_simple']['produits'][$i]->prix?></td>
                                        <td><input data-id="<?= $elements['produits_simple']['lignes'][$i]->id_ligne ;?>"type="number" min="1" name="quantite" class="quantite" id="" value="<?= $elements['produits_simple']['lignes'][$i]->quantite ;?>"></td>
                                        <td><span><?= $elements['produits_simple']['lignes'][$i]->prix_ligne ;?></span></td>
                                    </tr>
                                    <?php endfor ?>
                                    
                                    <?php foreach ($elements['produits_compose'] as $nom_produit_compose => $produits) :?>
                                        <?php 
                                            $single_produit_compose=$selection_produit_compose->get_single_produit_compose( $nom_produit_compose,$_SESSION['panier']);
                                            $prix=$selection_produit_compose->get_prix_unique($_SESSION['panier'],$nom_produit_compose);
                                            $quantite=$selection_produit_compose->get_quantite($_SESSION['panier'])[$nom_produit_compose];
                                            $prix_t=$selection_produit_compose->get_prix_produit_compose($_SESSION['panier'])[$nom_produit_compose];
                                        ?>
                                        <tr>
                                            <td scope="row"><a href="cart.php?nom_produit_del=<?= $nom_produit_compose ;?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                            <td><img src="<?=  $single_produit_compose[0]->image_produit_compose;?>" alt="image"></td>
                                            <td> <?=$single_produit_compose[0]->nom_produit_compose;?></td>
                                            <td><?= $prix;?></td>
                                            <td><input data-nom_produit_compose="<?=$nom_produit_compose ;?>" data-prix="<?= $prix;?>"type="number" min="1" name="quantite" class="quantite_composite quantite " id="" value="<?= $quantite ;?>" ></td>
                                            <td><span><?= $prix_t ;?></span></td>
                                        </tr>
                                        <?php foreach ($produits as $produit ) :?>
                                        <tr>
                                            <td scope="row"></td>
                                            <td><img src="<?= $produit->image_produit;?>" alt="image"></td>
                                            <td> <?=$produit->nom_produit;?></td>
                                            <td> <i class="fas fa-level-up-alt"></i><?= $produit->prix ;?></td>
                                            <td><input data-nom_produit_compose="<?= $nom_produit_compose ;?>" data-prix="<?= $produit->prix;?>" type="number" min="1" name="quantite" class="quantite" id="" value="<?= $quantite ;?>" readonly></td>
                                            <td><small><i class="fas fa-level-up-alt"></i> </small><span><?= ($produit->prix * $quantite) ;?></span></td>
                                        </tr>
                                        <?php endforeach ?>

                                    <?php endforeach ?>
                                    <?php
                                        
                                        $quantite_b=$product_builder->get_quantit($_SESSION['panier']);
                                        $prix_b=$product_builder->total($_SESSION['panier']);
                                        $prix_t=$quantite_b * $prix_b;
                                        
                                        if(!empty($elements['product_builder']))
                                        {
                                            echo '<tr> ';
                                            echo '<td scope="row"><a href="cart.php?builder_del='.$_SESSION['panier'].'"><i class="fa fa-times" aria-hidden="true"></i></a></td> ';
                                            echo '<td><img src="http://localhost/sbs/views/images/Boitier-Sharkoon-TG4-Red-ATX-B-300x300.jpg" alt="image"></td> ';
                                            echo '<td> PRODUCT BUILDER</td> ';
                                            echo '<td>'. $prix_b.'</td> ';
                                            echo '<td><input data-prix="<?= $prix_b;?>"type="number" min="1" name="quantite" class="quantite_builder quantite " id="" value="'. $quantite_b .'" ></td> ';
                                            echo '<td><span>'. $prix_t.'</span></td> ';
                                            echo '</tr> ';
                                        }
                                    ?>
                                    <?php foreach ($elements['product_builder'] as  $produit) :?>
                                        
                                        <tr>
                                            <td scope="row"></td>
                                            <td><img src="<?= $produit->image_produit;?>" alt="image"></td>
                                            <td> <?=$produit->nom_produit;?></td>
                                            <td> <i class="fas fa-level-up-alt"></i><?= $produit->prix ;?></td>
                                            <td><input  data-prix="<?= $produit->prix;?>" type="number" min="1" name="quantite" class="quantite" id="" value="<?= $quantite_b ;?>" readonly></td>
                                            <td><small><i class="fas fa-level-up-alt"></i> </small><span><?= ($produit->prix * $quantite_b) ;?></span></td>
                                        </tr>

                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4"  style="background-color:white; text-align:right;"> Total:</th>
                                        <th colspan="2" class="cart_pric"style=" text-align:right; padding-left:10px;"> <span><?= $panier->total_panier($_SESSION['panier']); ?></span> TND</th>

                                    </tr>
                                </tfoot>
                            </table>

                                <!-- Order Total -->
                        <?php
                            if(isset($_POST['code_promo']))
                            {
                                if(empty($codes) || !$code_promo_core->is_valide_code($_POST['code_promo']))
                                {
                        ?>
                                    <?= '<div class="order_total">';?>
                                    <?= '<div class="order_total_content text-md-right">';?>
                                    <?= '<div class="order_total_amount">Le code saisit n\'est pas valide</div>' ;?>
                                    <?= "</div>";?>
                                    <?= "</div>";?>
                        <?php   }
                                
                            }
                        ?>
                        <?php foreach($codes as $code){ 
                        ?>
                            <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Total Après réduction <strong>(-<?= $code->pourcentage?>%)</strong>:</div>
                                <div id="total_remise"class="order_total_amount"><?= $panier->total_discount($_SESSION['panier']);?> TND</div>
                            </div>
                            </div>
                        <?php 
                        }
                        ?>
						
                            <div class="cart_buttons">
                                <div class="code_promo">
                                    <form action="cart.php" method="post">
                                        <input type="text" name="code_promo" id="code_promo">
                                        <input name="bouton_code_promo" id="boutoncode_promo" class="btn btn-dark" type="submit" value="Code Promo">
                                    </form>
                                </div>
                                <a href="formulaire_panier.php"><button type="button" class="button cart_button_checkout">Commander</button></a>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="js/cart_custom.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/script_additionnel.js"></script>
</body>

</html> 