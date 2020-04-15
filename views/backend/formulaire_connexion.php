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
            <form action="connexion.php" name="formulaire_connexion" method="post">
                <div class="form-group">
                    <label for="login">Email</label>
                    <input type="text" class="form-control form-control-sm" name="login" id="login" aria-describedby="helpId" placeholder="darduoi@esprit.tn">
                    <small id="login1" class="form-text text-muted">verifier ce champ</small>
                </div>
                <div class="form-group">
                    <label for="mot_pass">Mot de passe</label>
                    <input type="password" class="form-control form-control-sm" name="mot_pass" id="mot_pass" aria-describedby="obligatoire" placeholder="*****">
                    <small id="mot_pass1" class="form-text text-muted">doit contenir minimum 6 caractéres</small>
                </div>
                <button type="button" class="btn btn-primary" onclick="test_connexion();">Connexion</button>
                <div class="oublie">
                    <a href="">Mot de passe oublié</a>
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