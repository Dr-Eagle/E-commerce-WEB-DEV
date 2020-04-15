<?php
include "include.php";
?>
<?php
$code_promo_core = new Code_promo_core();
if (isset($_GET['id_code'])) {
    $codes = $code_promo_core->query("SELECT * from code_promo where id_code=?", array($_GET['id_code']), "ret");
}
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
            <!-- body-->

            <div class="code_promo">
                <div class="container">
                    <h2>Code Promo</h2>
                    <h4>Données du code promo</h4>
                    <?php 
                    foreach ($codes as $code) :
                        ?>

                    <form method="post" action="code_promo.php?id_code=<?= $code->id_code; ?>" name="formulaire_code">
                        <div class="form-group row clearfix">
                            <label for="pourcentage" class="col-sm-4 col-form-label">Pourcentage</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" min="10" max="99" name="pourcentage" id="pourcentage" value="<?= $code->pourcentage;?>" readonly>
                            </div>
                        </div>
                        <p id="pourcentage1"> un nombre entre 10 et 99</p>
                        <div class="form-group row clearfix">
                            <label for="code" class="col-sm-4 col-form-label">Code promo</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="code" id="code" value="<?= $code->code; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row clearfix">
                            <label for="validite" class="col-sm-4 col-form-label">validité</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="validite" id="validite" value="<?= $code->validite; ?>">
                            </div>
                        </div>
                        <p id="validite1">donnez une date valide</p>
                        <div class="form-group row">
                            <div class="offset-sm-8 col-sm-10">
                                <input type="button" class="btn btn-primary button" value="Ajouter" onclick="test_code_promo();">
                            </div>
                        </div>

                    </form>

                    <?php
                endforeach
                ?>
                </div>
            </div>

            <!-- body-->


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