<?php
include "include.php";
$evenement=promo_core::afficherdapresid($_GET['id']);
$event=$evenement->fetch(PDO::FETCH_ASSOC);
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
                <h2>Promotion </h2>
                <h4>Ajouter une promotion </h4>

                <form method="POST" action="recuperation/Ajouterpromotion.php" name="formulaire_evenement">
                    <div class="form-group row clearfix">
                        <label for="validite" class="col-sm-4 col-form-label">Date début</label>
                        <div class="col-sm-7">
                            <input type="date" value="<?php echo $event['dated']?>" class="form-control" name="dated" id="validite" placeholder="" required="">
                        </div>
                    </div>
                    <div class="form-group row clearfix">
                            <label for="validite" class="col-sm-4 col-form-label">Date fin</label>
                            <div class="col-sm-7">
                                <input type="date" value="<?php echo $event['datef']?>" class="form-control" name="datef" id="validite1" placeholder="" required="">
                            </div>
                        </div>

                            <div class="form-group row clearfix">
                        <label for="pourcentage" class="col-sm-4 col-form-label"  >Produit</label>
                        <div class="col-sm-7">
                            <select name="idpro">
                                <?php
                                    $produits=promo_core::getProduct();

                                    foreach ($produits as $produit){
                                ?>
                                <option value="<?php echo $produit["id_produit"]; ?>"><?php echo $produit["nom_produit"]; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <p id="pourcentage1"> un nombre entre 10 et 99</p>
                        <div class="form-group row clearfix">
                            <label for="description" class="col-sm-4 col-form-label">Reduction</label>
                            <div class="col-sm-7">
                                <textarea type="number" class="form-control" name="reduction" 3placeholder="" required="">value="<?php echo $event['reduc']?>"</textarea>
                            </div>
                        </div>
                    <div class="form-group row">
                        <div class="offset-sm-8 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="Ajouter">Ajouter</button>
                        </div>
                    </div>

                </form>
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