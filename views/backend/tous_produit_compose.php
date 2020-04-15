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
                <h2>Produit composé</h2>
                <div class="option_ajout">
                    <label for="">option :</label><a href="formulaire_produit_compose.php">Ajouter un produit composé</a>  
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
                                <th class="nom">Nom</th>
                                <th class="prix">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						foreach($produit_compose as $pc){
						?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td><img src="<?php echo $pc['image_produit_compose']; ?>" alt="image">
                                <div class="option_produit">
                                        <a href="modifier_formulaire_produit_compose.php?id_proCom=<?php echo $pc['id_produit_compose']; ?>">Modifier Produit</a>
                                        <span>|</span>
                                        <a href="recuperation/supprimer_produit_compose.php?id_proCom=<?php echo $pc['id_produit_compose']; ?>">Supprimer produit</a>   
                                    </div>
                                </td>
                                <td><?php echo $pc['nom_produit_compose']; ?>
                                <td><?php echo $pc['prix_produit_compose']; ?>
                                
                                    
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