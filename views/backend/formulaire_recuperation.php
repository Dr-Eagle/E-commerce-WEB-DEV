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

    <div class="super_container">
        <div class="formulaire_connexion">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email_recuperation">Email de récupération</label>
                    <input type="text" name="email_recuperation" id="email_recuperation" class="form-control" placeholder="talla@esprit.tn" aria-describedby="email_recuperation1">
                    <small id="email_recuperation1" class="text-muted">ce champ n'est pas valide</small>
                </div>
                <button type="button" class="btn btn-primary" onclick="email_recuperation();">Connexion</button>
                <div class="oublie">
                    <a href="">Se connecter</a>
                </div>

            </form>
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