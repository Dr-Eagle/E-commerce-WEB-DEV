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
        <div class="affichage">
            <h2>Tous les Promotions</h2>
            <div class="navigation">
                <button type="submit">
                    <</button> <span>---</span>
                <button type="submit">></button>
                <div class="clear"></div>
            </div>
            <form method="post" action="trierpromotion.php">
             <div class="form-group">
                                              <h3>  <label for="recherche">Rechercher</label></h3>
                                                <select class="custom-select form-control-sm" name="recherche" id="recherche">
                                                    <option value="date">date</option>
                                                    <option value="reduction">reduction</option>
                                                    
                                                </select>
                                                <button type="submit"> trier</button>
                                            </div>

</form>

            <form action="trierpromotion.php" method="post">
                <table class="table table-striped table-inverse affichage_produit">
                    <thead class="thead-inverse">
                    <tr>
                        <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                        <th class="nom_utilisateur">Id </th>
                        <th class="nom_utilisateur">redu</th>
                        <th class="nom_utilisateur">Date début</th>
                        <th class="nom_utilisateur">Date fin</th>
                        <th class="nom_utilisateur">Produit</th>
                        <th class="nom_utilisateur">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $liste=promo_core::afficher_promotion();
                        $Evenements=$liste->fetchAll(PDO::FETCH_ASSOC);
                    foreach($Evenements as $clt){
                        ?>
                        <tr>
                            <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                            <td>
                                <?php echo $clt['id_pro']; ?>
                            </td>
                            <td>
                                <?php echo $clt['reduc']; ?>
                            </td>
                            <td><?php echo $clt['dated']; ?></td>
                            <td><?php echo $clt['datef']; ?></td>
                            <td><?php echo $clt['id_produit']; ?></td>
                            <td> 
                                    <a class="btn btn-danger" href="recuperation/supprimer_promo.php?id=<?PHP echo $clt['id_pro'];?>">Supprimer</a>
                                    <a class="btn btn-warning" href="modifier_promo.php?id=<?PHP echo $clt['id_pro'];?>">Modifier</a>
                            </td>
                        </tr>
                        <?php
                    }
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