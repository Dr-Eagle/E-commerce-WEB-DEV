<?php
include "include.php";
include "../../core/Event_core.php"
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
            <h2>Tous les Evenements</h2>
            <div class="navigation">
                <button type="submit">
                    <</button> <span>---</span>
                <button type="submit">></button>
                <div class="clear"></div>
            </div>

             <div class="form-group">
                                                <h3><buton type="submit" for="recherche">Rechercher</buton></h3>
                                                <select class="custom-select form-control-sm" name="recherche" id="recherche">
                                                    <option value="aucun">Aucun</option>
                                                    <option value="silver">Date</option>
                                                    <option value="gold">Type</option>
                                                    
                                                </select>
                                            </div>



            <form action="" method="post">
                <table class="table table-striped table-inverse affichage_produit">
                    <thead class="thead-inverse">
                    <tr>
                        <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                        <th class="nom_utilisateur">Id </th>
                        <th class="image_produit"><i class="fas fa-file-image"></i>Image</th>
                        <th class="nom_utilisateur">Nom</th>
                        <th class="nom_utilisateur">Description</th>
                        <th class="nom_utilisateur">Type</th>
                        <th class="nom_utilisateur">Date début</th>
                        <th class="nom_utilisateur">Date fin</th>
                        <th class="nom_utilisateur">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $liste=Event_core::afficher_evenement();
                        $Evenements=$liste->fetchAll(PDO::FETCH_ASSOC);
                    foreach($Evenements as $clt){
                        ?>
                        <tr>
                            <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                            <td>
                                <?php echo $clt['id_ev']; ?>
                            </td>
                            <td>
                                <img src="<?php echo $clt['img']; ?>" alt="image">

                            </td>
                            <td>
                                <?php echo $clt['nom_ev']; ?>
                            </td>
                            <td>
                                <?php echo $clt['description']; ?>
                            </td>
                            <td><?php echo $clt['type']; ?></td>
                            <td><?php echo $clt['dated']; ?></td>
                            <td><?php echo $clt['datef']; ?></td>
                            <td> 
                                    <a class="btn btn-danger" href="recuperation/supprimer_event?id=<?PHP echo $clt['id_ev'];?>">Supprimer</a>
                                    <a class="btn btn-warning" href="modifier_event.php?id=<?PHP echo $clt['id_ev'];?>">Modifier</a>
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