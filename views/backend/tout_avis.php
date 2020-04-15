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
                <h2>Tout les Avis</h2>
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
                                <th class="nom_utilisateur">Id Avis</th>
                                <th class="nom_utilisateur">Nom</th>
                                <th class="nom_utilisateur">Prenom</th>
								<th class="nom_utilisateur">Nom_Produit</th>
                                <th class="Adresse_Messagerie">Adresse_Messagerie</th>
                                <th class="nom_utilisateur">Note</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						foreach($avis as $avi){
						?>
                            <tr>
								<td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td>
                                <?php echo $avi['id_avis']; ?>
                                <div class="option_produit">      
                                        <a href="recuperation/supprimer_avis.php?id_avis=<?PHP echo $avi['id_avis'];?>">Supprimer</a>
                                    </div>
                                </td>
                                <td>
                                   <?php echo $avi['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $avi['prenom']; ?>
                                </td>
								<td><?php echo $avi['nom_produit']; ?></td>
                                <td><?php echo $avi['email']; ?></td>
                                <td><?php echo $avi['note']; ?></td>
								
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