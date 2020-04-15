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
            <!-- pied de page-->
            <!-- formulaire utilisateur -->
            <div class="formulaire_livreur">

                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="formulaire">
                                <h3>Ajouter un utilisateur</h3>

                                <form method="post" action="recuperation/ajouter_admin.php" name="formulaire_utilisateur">
                                    <div class="label pp">
                                        <p><img alt="photo de profil" src="" id="image_utilisateur" /></p>
                                        <div class="select_image">
                                            <a href="#"><input type="file" name="image_profila" id="url_photo"> ajouter une photo</a>
                                        </div>
                                    </div>
                                    <div class="obligatoire" id="url_photo1">
                                            <p style="text-align:left;">vous devez selectionner une pp</p>
                                        </div>
                                
                                    <div class="label">
                                        <label>Nom</label>
                                        <input type="text"  name="nom" id="nom_utilisateur">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="nom_utilisateur1">
                                            <p>le nom est obliagtoire</p>
                                        </div>

                                    </div>
                                    <div class="label">
                                        <label>Prenom</label>
                                        <input type="text"  name="prenom" id="prenom_utilisateur">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="prenom_utilisateur1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Mot de passe</label>
                                        <input type="password"  name="mot_de_passe" id="mot_pass_utilisateur">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="mot_pass_utilisateur1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Email</label>
                                        <input type="text"  name="email" id="email_utilisateur">
                                        <div class="clear"></div>
                                        <div class="obligatoire" id="email_utilisateur1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    
                                    <div class="label">
                                        <input type="button" id="bouton_ajout" value="Ajouter" onclick="test_utilisateur();">
                                    </div>


                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            
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