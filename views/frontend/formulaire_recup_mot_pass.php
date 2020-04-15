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
        if($_GET['ip']==0){
        ?>

        <div class="formulaire_connexion">
            <div class="container">
                
                <form  name="formulaire_connexion" action="../backend/sendmail/mot_de_passe.php" method="post">

                    <div class="label">
                        <label>Email</label>
                        <input type="text" id="email_connexion" name="email">
                        <div class="clear"></div>
                        <div class="obligatoire" id="email_connexion1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                  
                    <div class="label">
                        <input type="submit" id="bouton_connexion" onclick="test_connexion();" class="button" value="Envoyer">
                    </div>
                    
                </form>
            </div>
        </div>
        <?php }
        if($_GET['ip']==1){
            ?>
            <div class="formulaire_connexion">
            <div class="container">
                
                <form  name="formulaire_connexion" action="../backend/sendmail/mot_de_passe.php" method="post">

                    <div class="label">
                        <label>Email</label>
                        <input type="text" id="email_connexion" name="email">
                        <div class="clear"></div>
                        <div class="obligatoire" id="email_connexion1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                  <p text-color=red;>ce mail n'existe pas</p>
                    <div class="label">
                        <input type="submit" id="bouton_connexion" onclick="test_connexion();" class="button" value="Envoyer">
                    </div>
                    
                </form>
            </div>
        </div>
        <!--footer-->
        <?php
    }
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