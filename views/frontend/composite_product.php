<?php
session_start();

include "include.php";
?>
<?PHP
$produit_compose_core=new Produit_compose_core();
$produitcomp=$produit_compose_core->affiche_single_produit_compose("MAX BOX SILVER");
$component=$produit_compose_core->get_product("max box","silver",'1');
$defaut=$produit_compose_core->x_box_default_value("max box","silver");
//var_dump($defaut);
//$produit_compose_core->update_produit_compose();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "tete.php";

    ?>
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/composite.css">
</head>

<body>

    <div class="super_container">
        <!-- Header -->
        <?php
        include "entete.php";
        ?>

       
        <?php 
        foreach($produitcomp as $compose){
            
        ?>

        <div class="container">
            <div class="composite_product">
                <div class="image">
                    <img src="<?=$compose->image_produit_compose;?>" alt="">
                </div>
                <div class="produit">
                    <div class="configurateur">
                        <h6>configurateur</h6>
                        <h4 class="nom_produit_compose"><?= $compose->nom_produit_compose;?></h4>
                    </div>
                    <div class="description">
                        <ul>
                            <li><?=$compose->description_produit_compose;?></li>
                            
                        </ul>
                    </div>
                    <div class="prix">
                        <h3><?=$compose->prix_produit_compose;?> TND</h3>
                    </div>
                    <?php
                        foreach ($component as $key => $produits) {
                        
                    ?>
                    <div class="composant">
                        <h3><?= $key;?></h3>
                        <h6>options disponibles :</h6>
                        <div class="options">
                        <?php
                            foreach ($produits as $produit) {
                        ?>
                            <a class="selected_option" href="">
                            <div class="option">
                            <img src="<?=$produit->image_produit;?>" alt="">
                            <div class="descri">
                                <p><?=$produit->nom_produit;?></p>
                                <p class="prix_single" data-nom="max box" data-type="<?=($produit->max_box != NULL)?$produit->max_box:"";?>" data-id="<?= $produit->id_produit;?>" data-prix="<?=$produit->prix;?>"><?=$produit->prix;?> TND</p>
                            </div>
                            <div class="difference_prix">
                                <p></p>
                            </div>
                            </div>
                            </a>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                     <div class="ajouter_panier">
                        <div class="element prix_total"><strong class="h3"></strong> TND</div>
                       
                        <div class="element" ><a href="#" id="add_to_cart" class="btn btn-primary">Ajouter au panier</a></div>
                    </div>
                </div>
            </div>
           
            <?php
            }
            ?>
            
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
    <script src="plugins/slick-1.8.0/slick.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/script_additionnel.js"></script>
</body>

</html> 