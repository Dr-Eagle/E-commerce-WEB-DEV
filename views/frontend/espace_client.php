<?php
session_start();
include "include.php";
?>
<?php
    if(!isset($_SESSION['client']) || $_SESSION['client']=="")
    {
        header("Location: formulaire_connexion.php");
    }
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

        <div class="container">
            <div class="option_client">
                <br><br>
                <h2>Votre compte</h2>
                <div class="espace_client">
                    <div class="option"> <a href="modifier_client.php?id_clt=<?php echo $_SESSION['client']; ?>"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <span>Informations</span>
                        </a> </div>
                    <div class="option"><a href="historique_commandes.php"> <i class="fa fa-list" aria-hidden="true"></i>
                           <span>commandes</span>
                        </a></div>
                    <div class="option"><a href="recuperation/deconnexion.php"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <span>Deconnexion</span>
                        </a> </div>
                        <div class="option"><a href="formulaire_reclamation.php"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <span>Reclamation</span>
                        </a> </div>
                        <div class="option"><a href="tout_avis.php"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <span>Mes avis</span>
                        </a> </div>
                </div>
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