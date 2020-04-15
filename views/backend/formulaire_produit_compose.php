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

            <div class="formulaire_produit">
                <div class="container">
                    <form action="recuperation/ajouter_produit_compose.php" method="post" name="formulaire_produit_compose">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="formulaire">

                                    <div class="label">
                                        <label>Ajouter un produit</label>
                                        <input type="text" id="nom_produit_compose" name="nom_produit_compose" placeholder="Nom du produit_compose">
                                        <div class="obligatoire" id="nom_produit_compose1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Image</label>
                                        <input type="file" id="image_produit_compose" name="image_produit_compose" placeholder="image du produit_compose">
                                        <div class="obligatoire" id="image_produit_compose1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Ajouter une description courte</label>
                                        <textarea id="description_courte_produit_compose" name="description_produit_compose"></textarea>
                                        <div class=" obligatoire" id="description_courte_produit_compose1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label zone_tarif" style="justify-content: flex-start;">
                                        <label>Tarif régulier    :</label>
                                        <input type="number" name="prix_produit_compose" class="tarif" id="tarif_regulier_compose">
                                        <span>DT</span>
                                        <div class="obligatoire" id="tarif_regulier_compose1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="publier">
                                    <input type="button" value="Ajouter un produit compose" class="publier_input" onclick="test_produit_compose();">
                                </div>
                            </div>
                        </div>
                        
                    </form>


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