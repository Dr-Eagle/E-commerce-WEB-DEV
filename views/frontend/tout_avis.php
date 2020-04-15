<?php
session_start();
    
    include "include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
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

        <!-- tout avis-->

        <div class="formulaire_avis">
            
               
                    <div class="col">
                        
                          <h3>Tout les Avis</h3>
                            <div class="option_ajout">
                              <label for="">option :</label><a href="formulaire_avis.php">Ajouter un avis</a>
                            </div>
                        </div>
                        
                            <table class="table table-striped table-inverse affichage_produit">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                        <th class="nom_utilisateur">Id Avis</th>
                                        <th class="nom_utilisateur">Nom</th>
                                        <th class="nom_utilisateur">Prenom</th>
                                        <th class="nom_utilisateur">Nom_Produit</th>
                                        <th class="nom_utilisateur">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     foreach($avis as $av){
                                    ?>
                                    <tr>
                                        <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                        <td>
                                          <?php echo $av['id_avis']; ?>
                                            <div class="option_produit">
                                              <a href="modifier_avis.php?id_av=<?php echo $av['id_avis']; ?>">Modifier</a>
                                             <span>|</span>
                                             <a href="recuperation/supprimer_avis.php?id_av=<?PHP echo $av['id_avis'];?>">Supprimer</a>
                                            </div>
                                        </td>
                                        <td><?php echo $av['nom']; ?></td>
                                        <td><?php echo $av['prenom']; ?></td>
                                        <td><?php echo $av['nom_produit']; ?></td>
                                        <td><?php echo $av['note']; ?></td>
                                    </tr>
                                    <?php
                                      }
                                    ?>
                                </tbody>
                            </table>
                        
                
            
        </div>

        <!--footer-->
        <?php
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
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/slick-1.8.0/slick.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/controle_formulaire.js"></script>
</body>

</html> 