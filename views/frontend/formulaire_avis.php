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

        <!-- formulaire avis-->

        <div class="formulaire_avis">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="formulaire">
                            <h3>Avis</h3>
                            <form method="post" action="sendmail/index.php" name="formulaire_avis">
                           
                                <div class="row ligne">
                                    <label>Nom</label>
                                    <input type="text" name="nom" id="nom_avis">
                                    <div class=" obligatoire" id="nom_avis1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Prenom</label>
                                    <input type="text" name="prenom" id="prenom_avis">
                                    <div class=" obligatoire" id="prenom_avis1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Nom produit</label>
                                    <input type="text" name="nom_produit" id="nom_prod_avis">
                                    <div class=" obligatoire" id="nom_prod_avis1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email_reclamation">
                                    <div class=" obligatoire" id="email_reclamation1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Note</label>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"> Mauvais <input type="radio" name="note" value="Mauvais" id="note_mauvais" onclick="select_mauvais(); " checked></li>
                                        <li class="list-inline-item"> Moyenne <input type="radio" name="note" value="Moyenne" id="note_moyenne" onclick="select_moyenne();"></li>
                                        <li class="list-inline-item"> Bien <input type="radio" name="note" value="Bien" id="note_bien" onclick="select_bien();"></li>
                                        <li class="list-inline-item"> Trés bien <input type="radio" name="note" value="Trés bien" id="note_tres_bien" onclick="select_tres_bien();"></li>
                                    </ul>
                                    <div class=" obligatoire" id="note_avis1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="label">
                                    <input type="button" id="bouton_connexion" value="Noter" onclick="test_avis();">
                                    


                                </div>
                            </form>


                        </div>

                    </div>

                </div>

            </div>

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