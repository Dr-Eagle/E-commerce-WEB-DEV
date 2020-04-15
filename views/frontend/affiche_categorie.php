<?php
session_start();
include "include.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
    
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
        <?PHP

        $categorie1 = new Categorie_core();
        $categorie = $categorie1->affiche_categorie();
        ?>
        
        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
                <?php
                foreach ($categorie as $nom_categorie) {
                    if ($nom_categorie['id_categorie'] == $_GET['id_cate']) {
                        ?>
                <h2 class="home_title">
                    <?PHP echo $nom_categorie['nom_categorie']; ?>
                </h2>
                <?php

            }
        }
        $categorie1 = new Categorie_core();
        $categorie = $categorie1->affiche_categorie();
        ?>
            </div>
        </div>

        <!-- Shop -->

        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <!-- Shop Sidebar -->
                        <div class="shop_sidebar">

                            <div class="sidebar_section">

                                <div class="sidebar_title">Categories</div>
                                <?php
                                foreach ($categorie as $nom_categorie) {

                                    ?>
                                <ul class="sidebar_categories">

                                    <li><a href="affiche_categorie.php?id_cate=<?php echo $nom_categorie['id_categorie']; ?>">
                                            <?PHP echo $nom_categorie['nom_categorie']; ?></a></li>

                                </ul>
                                <?php

                            }
                            ?>
                             <!-- Shop Content 
                           </div>
                            <div class="sidebar_section filter_by_section">
                                <div class="sidebar_title">Filter By</div>
                                <div class="sidebar_subtitle">Price</div>
                                <div class="filter_price">
                                    <div id="slider-range" class="slider_range"></div>
                                    <p>Range: </p>
                                    <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                                </div>-->
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-9">

                        <!-- Shop Content -->

                        <div class="shop_content">
                            <div class="shop_bar clearfix">

                                <?php
                                $i = 0;
                                foreach ($sous_categorie as $var) {
                                    if ($var['ide_categorie'] == $_GET['id_cate']) {

                                        $produit1 = new Produit_core();
                                        $produit = $produit1->affiche_produit();
                                        foreach ($produit as $pr) {
                                            if ($pr['ide_sous_categorie'] == $var['id_sous_categorie']) {
                                                $i++;
                                            }
                                        }
                                    }
                                }
                                ?>
                                <div class="shop_product_count"><span><?php echo $i; ?></span> produits trouvés </div>

                                <div class="shop_sorting">
                                    <span>Tri avec :</span>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">aucun<i class="fas fa-chevron-down"></span></i>
                                            <ul>
                                               
                                                <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>nom A->Z</li>
                                                <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>prix croissant</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="product_grid">
                                <div class="product_grid_border"></div>

                                <!-- Product Item -->
                                <?php
                                $sousCategorie1 = new Sous_categorie_Core();
                                $sous_categorie = $sousCategorie1->affiche_sous_categorie();
                                foreach ($sous_categorie as $var) {
                                    if ($var['ide_categorie'] == $_GET['id_cate']) {
                                        $produit1 = new Produit_core();
                                        $produit = $produit1->affiche_produit();
                                        foreach ($produit as $pr) {
                                            if ($pr['ide_sous_categorie'] == $var['id_sous_categorie']) {
                                                if($pr['quantite']> 0 )
                                                {
                                                    $message="En stock";
                                                    $color="green";
                                                }
                                                else{
                                                    $message="Hors stock ";
                                                    $color="red";
                                                }
                                                ?>
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><a href="product.php?id_pro=<?php echo $pr['id_produit']; ?>" tabindex="0"><img src="<?php echo $pr['image_produit']; ?>" alt=""></a></div>
                                    <div class="product_content">
                                        <div class="product_price"><?php echo $pr['prix']; ?> TND</div>
                                        <div class="product_name">
                                            <div><a href="product.php?id_pro=<?php echo $pr['id_produit']; ?>" tabindex="0"><?php echo $pr['nom_produit']; ?></a></div>
                                        </div>
                                    </div>
                                    <div class="add_cart">
                                    <p style="color:<?= $color;?> ;"><?= $message?></p>
                                    </div>
                                    <div class="add_cart">
                                          <a href="recuperation/panier_add.php?id_produit=<?=$pr['id_produit']?>" class="btn btn-primary add add_to_cart" style="background-color: #1ca8d6;"> Ajouter  <i class="fas fa-cart-plus"></i></a>
                                    </div>

                                </div>
                                <?php

                            }
                        }
                    }
                }
                ?>
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
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/shop_custom.js"></script>
    <script src="js/script_additionnel.js"></script>
</body>

</html> 