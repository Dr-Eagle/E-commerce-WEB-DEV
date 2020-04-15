<?php
include "include.php";
?>
<!DOCTYPE html>
<html>

<head>
<?php
    include 'tete.php';
    ?>

</head>

<body>

    <!-- Entete-->
    <?php
    include "entete.php";
    ?>
    <!-- Entete-->

    <div class="super_container">
        <!-- Menu de gauche-->

        <?php
        include "menu.php";
        ?>
        <!-- Menu de gauche-->

        <div class="space_work">
            <!-- body-->
            <div class="formulaire_produit categorie">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2>Modifier une categorie</h2>
                            <?php
                                    foreach ($categorie as $cat) {
                                        if ($cat['id_categorie'] == $_GET['id_cat']) {
                                            ?>
                            <form action="recuperation/modifier_categorie.php?id_cat=<?php echo $cat['id_categorie']; ?>" method="post" name="formulaire_categorie">
                                <div class="label">
                                    <label for="nom_categorie">Nom de la categorie</label>
                                    
                                    <input type="text" name="nom_categorie" id="nom_categorie" value="<?php echo $cat['nom_categorie']; ?>">
                                    <?php

                                }
                            }
                            ?>
                                    <div class=" obligatoire" id="nom_categorie1">
                                        <p>vous avez oublié le nom de la categorie</p>
                                    </div>
                                </div>
                                <div class=" label">
                                    <label for="lien_categorie">lien categorie</label>
                                    <?php
                                    $categorie1 = new Categorie_core();
                                    $categorie = $categorie1->affiche_categorie();
                                    foreach ($categorie as $cat) {
                                        if ($cat['id_categorie'] == $_GET['id_cat']) {
                                            ?>
                                    <input type="text" name="lien_categorie" id="lien_categorie" value="<?php echo $cat['lien_categorie']; ?>">
                                    <?php
                                    }
                                    }
                                    ?>
                                    <div class="obligatoire" id="lien_categorie1">
                                        <p>vous avez oublié le lien de la categorie</p>
                                    </div>
                                </div>
                                <div class="publier">
                                    <input type="button" value="Modifier Categorie" class="publier_input" onclick="test_categorie();">
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- body-->


            <!-- pied de page-->

            <div class="footer">
                <p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a></p>
            </div>

            <!-- pied de page-->
        </div>
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
    <script src="js/controle_formulaire.js"></script>
</body>

</html> 