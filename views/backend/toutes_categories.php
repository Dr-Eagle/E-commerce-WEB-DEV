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
                <h2>Toutes les categories</h2>
                <div class="option_ajout">
                    <label for="">option :</label><a href="ajout_categorie.php">Ajouter une categorie</a> </label>
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
                                <th class="id_produit">Id categorie</th>
                                <th class="nom">Nom categorie</th>
								<th class="nom">Lien categorie</th>

                            </tr>
                        </thead>
                        <tbody>
						<?php
						foreach($categorie as $va){
						?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td><?php echo $va['id_categorie']; ?>
                                    <div class="option_produit">
                                        <a href="modifier_catgorie.php?id_cat=<?php echo $va['id_categorie']; ?>">Modifier</a>
                                        <span>|</span>
                                        <a href="/sbs/views/backend/recuperation/supprimer_categorie.php?id_cat=<?php echo $va['id_categorie']; ?>">Supprimer</a>
                                    </div>
                                </td>
                                <td><?php echo $va['nom_categorie']; ?></td>
								<td><?php echo $va['lien_categorie']; ?></td>
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

                <!-- sous cotegorie-->

                <br /><br /><br />
                <h2>Toutes les sous categories</h2>
                <div class="option_ajout">
                    <label for="">option :</label><a href="ajout_categorie.php">Ajouter une sous categorie</a> </label>
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
                                <th class="id_produit">Id sous categorie</th>
                                <th class="nom">Nom sous categorie</th>
								<th class="nom">Lien sous categorie</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						foreach($sous_categorie as $var){
						?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td><?php echo $var['id_sous_categorie']; ?>
                                    <div class="option_produit">
                                        <a href="modifier_sous_categorie.php?id_sous_cat=<?php echo $var['id_sous_categorie']; ?>">Modifier</a>
                                        <span>|</span>
                                        <a href="/sbs/views/backend/recuperation/supprimer_sous_categorie.php?id_cati=<?php echo $var['id_sous_categorie']; ?>">Supprimer</a>
                                    </div>
                                </td>
                                <td><?php echo $var['nom_sous_categorie']; ?></td>
								<td><?php echo $var['lien_sous_categorie']; ?></td>
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