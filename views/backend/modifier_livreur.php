
 <?php
    include 'include.php';
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
            <!-- pied de page-->

            <!-- formulaire livreur -->
            <div class="formulaire_livreur">

                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="formulaire">
                                <h3>Modifier un liveur</h3>
								<?php
								foreach($livreur as $li){
								if($li['id_livreur']==$_GET['id_li']){
								?>
                                <form method="post" action="recuperation/modifier_livreur.php?id_liv=<?php echo $li['id_livreur']; ?>" name="formulaire_livreur">
                                    <div class="label pp">
                                        <p><img alt="photo de profil" src="<?php echo $li['image_livreur']; ?>" id="image_livreur" /></p>
                                        <div class="select_image">
                                            <a href="#"><input type="file"  name="image_livreur" id="url_photo"> Modifier  photo</a>
                                        </div>
                                    </div>
                                    <div class="obligatoire" id="url_photo1">
                                            <p style="text-align:left;">vous devez selectionner une pp</p>
                                        </div>
                                    <div class="label">
                                        <label>Nom</label>
                                        <input type="text"  name="nom_livreur" id="nom_livreur" value="<?php echo $li['nom_livreur']; ?>">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="nom_livreur1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>

                                    </div>
                                    <div class="label">
                                        <label>Prenom</label>
                                        <input type="text"  name="prenom_livreur" id="prenom_livreur"  value="<?php echo $li['prenom_livreur']; ?>">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="prenom_livreur1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Email</label>
                                        <input type="text"  name="email_livreur" id="email_livreur" value="<?php echo $li['email_livreur']; ?>">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="email_livreur1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Telephone</label>
                                        <input type="text"  name="telephone" id="telephone_livreur" value="<?php echo $li['telephone']; ?>">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="telephone_livreur1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <input type="button" id="bouton_ajouter" value="Modifier Livreur" onclick="test_livreur();">
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

            </div>
            <div class="footer">
                <p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a></p>
            </div>

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