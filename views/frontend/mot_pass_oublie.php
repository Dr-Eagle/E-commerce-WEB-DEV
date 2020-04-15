<?php
session_start();
    /*if(isset($_COOKIE['panier']))
    {
        setcookie("panier","",time() - 3600,"/");
        unset($_COOKIE['panier']);
        echo 'entre';
    }
    else
    {
        echo 'ne';
    }
    */
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
        <!-- header-->

        <!--body-->
        <div class="formulaire_connexion">
            <div class="container">
                <form method="post" name="formulaire_recuperation" action="5.php">
                    <div class="label">
                        <label>Email de recuperation</label>
                        <input type="text" id="email_recuperation">
                        <div class="clear"></div>
                        <div class="mot_pass_connexion obligatoire" id="email_recuperation1">
                            <p>Email incorrect</p>
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="label">
                        <input type="button" id="bouton_recuperer" value="Valider" onclick="email_verification();">
                    </div>

                </form>
            </div>
        </div>
        <!--body-->

        <!--footer-->
        <?php
        include "pied.php";
        ?>
        <!--footer-->
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