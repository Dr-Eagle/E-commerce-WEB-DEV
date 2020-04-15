<?php
include "include.php";
?>
<!DOCTYPE html>
<html>

<head>
<?php
include "tete.php";
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
            <h2>Ajouter un catalogue</h2>
                <div class="container">
                    <div class="col">
                        <div class="select_categorie">
                        <?php
                        foreach($produit as $pr){
                            if($pr['id_produit']==$_GET['id_produit']){
                                ?>
                            <form action="recuperation/ajouter_catalogue.php?id_produit=<?php echo $pr['id_produit'];?>" method="post" name="formulaire_catalogue">
                                <div class="label">
                                    <div class="categorie_produit catalogue">
                                        <h3>Image principale</h3>
                                        <input type="file" id="image_principale_produit" class="input_file" name="image_principale">
                                        <div class=" obligatoire" id="image_principale_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="categorie_produit catalogue">
                                        <h3>Image 2</h3>
                                        <input type="file" id="image_principale_produit2" name="image_2" class="input_file">
                                        <div class=" obligatoire" id="image_principale_produit21">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="categorie_produit catalogue">
                                        <h3>Image 3</h3>
                                        <input type="file" id="image_principale_produit3" name="image_3" class="input_file">
                                        <div class=" obligatoire" id="image_principale_produit31">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="categorie_produit catalogue">
                                        <h3>Image_4</h3>
                                        <input type="file" id="image_description_produit" name="image_description" class="input_file">
                                        <div class=" obligatoire" id="image_principale_produit31">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="publier">
                                        <input type="button" value="Ajouter un catalogue" class="publier_input" onclick="test_catalogue();">

                                    </div>
                                </div>
                            </form>
                            <?php
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- pied de page-->

            <div class="footer">
                <p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a></p>
            </div>

            <!-- pied de page-->
        </div>
        <!-- body-->



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