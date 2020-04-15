<?php
session_start();
/*if(isset($_COOKIE['panier']))
    {
        setcookie("panier","",time() - 3600,"/");
        unset($_COOKIE['panier']);
        echo 'entre';
    }
    else
    {
        echo 'ne';
    }
    */
include "include.php";
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
        foreach($composite as $compo){
            if($compo['type1']=="Max Box"){
        ?>

        <div class="container">
            <div class="product_acceuil">
                <div class="contenu">
                    <div class="titre1">
                        <h2><?php echo $compo['titre1']; ?></h2>
                    </div>
                    <div class="titre2">
                        <h3><?php echo $compo['titre2']; ?></h3>
                    </div>
                    <div class="composite">
                        <div class="compo">
                            <h3><?php echo $compo['nom_option1']; ?></h3>
                            <img src="<?php echo $compo['image_option1']; ?>" alt="">
                            <p><?php echo $compo['description_option1']; ?></p>
                            <h4><?php echo $compo['prix_option1']; ?> TND</h4>
                            <a name="selectionner" id="selectionner" class="btn btn-primary" href="composite_product.php" role="button">Selectionner</a>
                        </div>
                        <div class="compo ">
                            <h3><?php echo $compo['nom_option2']; ?></h3>
                            <img src="<?php echo $compo['image_option2']; ?>" alt="">
                            <p><?php echo $compo['description_option2']; ?></p>
                            <h4><?php echo $compo['prix_option2']; ?> TND</h4>
                            <a name="selectionner" id="selectionner" class="btn btn-primary" href="composite_productMG.php" role="button">Selectionner</a>
                        </div>
                        <div class="compo ">
                             <h3><?php echo $compo['nom_option3']; ?></h3>
                            <img src="<?php echo $compo['image_option3']; ?>" alt="">
                            <p><?php echo $compo['description_option3']; ?></p>
                            <h4><?php echo $compo['prix_option3']; ?> TND</h4>
                            <a name="selectionner" id="selectionner" class="btn btn-primary" href="composite_productMD.php" role="button">Selectionner</a>
                        </div>
                    </div>
                    
                </div>
                <div class="station_pro">
                <a name="selectionner" id="selectionner" class="btn btn-primary" style="float:right;"href="affiche_sous_categorie.php?id_sousC=<?php echo $_GET['id_sousC']; ?>" role="button">Cliquer ici pour voir toutes les station pro <i class="fas fa-arrow-circle-right    "></i></a>
                <div class="clear"></div>
                <br>
                </div>
            </div>
        </div>
        <?php
           }
        }
        ?>
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
</body>

</html> 