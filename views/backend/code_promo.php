<?php
include 'include.php';
?>
<?php
    $code_promo_core = new Code_promo_core();
    if (isset($_POST['pourcentage']) && isset($_POST['code']) && isset($_POST['validite']) and isset($_GET['id_code'])) {
        $Code = new Code_promo($_GET['id_code'], $_POST['code'], $_POST['pourcentage'], $_POST['validite']);
        $code_promo_core->add_code($Code);
    }
    if(isset($_GET['id_code_del']))
    {
        $code_promo_core->delete_code($_GET['id_code_del']);
    }
    $codes = $code_promo_core->query("SELECT * from code_promo", array(), "ret");
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
            <div class="affichage">
                <h2>Code Promo</h2>
                <div class="option_ajout">
                    <label for="">option :</label><a href="ajouter_code_promo.php">Ajouter un code promo</a> </label>
                </div>
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>
                
                <form action="" method="post">
                    <table class="table table-striped table-inverse affichage_produit">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="image_produit">Nom du code</th>
                                <th class="nom_utilisateur">Pourcentage</th>
                                <th class="Adresse_Messagerie">Validite</th>
                                <th class="Type_client">Usage</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($codes as $code) :
                            ?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td>
                                    <h4><?= $code->code; ?></h4>
                                    <div class="option_produit">
                                        <a href="modifier_code_promo.php?id_code=<?= $code->id_code; ?>">Modifier</a>
                                        <span>|</span>
                                        <a href="code_promo.php?id_code_del=<?= $code->id_code; ?>">Supprimer</a>
                                    </div>
                                </td>
                                <td>
                                <?= $code->pourcentage; ?>
                                </td>
                                <td><?= $code->validite; ?></td>
                                <td><?= $code->usagec; ?></td>
                            </tr>
                            <?php
                            endforeach
                            ?>
                        </tbody>
                    </table>
                </form>
              
                <br />
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
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