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
            <div class="affichage">
                <h2>Composite product</h2>
                <div class="option_ajout">
                    <label for="">option :</label><a href="formulaire_composite_product.php">Ajouter une page Composite product</a>  
                </div>
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>
                <form action="" method="post">
                    <table class="table table-striped table-inverse affichage_produit">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="image_produit"><i class="fas fa-file-image"></i></th>
                                <th class="image_produit"><i class="fas fa-file-image"></i></th>
                                <th class="image_produit"><i class="fas fa-file-image"></i></th>
                                <th class="nom">titre 1</th>
                                <th class="quantite">titre 2</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						foreach($composite_product as $comp){
						?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td><img src="<?php echo $comp['image_option1']; ?>" alt="image">
                                <div class="option_produit">
                                        <a href="modifier_formulaire_composite_product.php?id_comp=<?php echo $comp['id_composite_product']; ?>">Modifier Produit</a>
                                        <span>|</span>
                                        <a href="recuperation/supprimer_composite_product.php?id_comp=<?php echo $comp['id_composite_product']; ?>">Supprimer produit</a>   
                                    </div>
                                </td>
                                <td><img src="<?php echo $comp['image_option2']; ?>" alt="image"></td>
                                <td><img src="<?php echo $comp['image_option3']; ?>" alt="image"></td>
                                <td><?php echo $comp['titre1']; ?>
                                <td><?php echo $comp['titre2']; ?>
                                  
                                   
                                </td>
                               
                            </tr>
                         <?php
						 }
						 ?>
                        </tbody>
                    </table>
                </form>
                <br />
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>
            </div>


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