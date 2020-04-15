<?php
session_start();
    include "include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
    <?php 
	include 'tete.php';
	?>

</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <?php
        include "entete.php";
        ?>

        <div class="formulaire_connexion">
            <div class="container">
                <form  name="formulaire_connexion" action="recuperation/se_connecter.php" method="post">
                    <div class="label">
                        <label>Email</label>
                        <input type="text" id="email_connexion" name="email">
                        <div class="clear"></div>
                        <div class="obligatoire" id="email_connexion1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                    <div class="label">
                        <label>Mot de passe</label>
                        <input type="password" id="mot_pass_connexion" name="mot_de_passe">
                        <div class="clear"></div>
                        <div class="obligatoire" id="mot_pass_connexion1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                    <p><a href="formulaire_recup_mot_pass.php?ip=0">Mot de passe oublié ?</a></p>
                    <div class="label">
                        <input type="button" id="bouton_connexion" onclick="test_connexion();" value="Connexion">
                    </div>
                    <p class="creer_compte"><a class="h4" href="formulaire_inscription.php">Creer un compte </a></p>
                </form>
            </div>
        </div>

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
    <script src="plugins/easing/easing.js"></script>
    <script src="js/controle_formulaire.js"></script>
</body>

</html> 