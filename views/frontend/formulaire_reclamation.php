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

        <!-- formulaire reclamation-->

        <div class="formulaire_reclamation">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="formulaire">
                            <h3>Réclamation</h3>

                            <form method="post" action="sendmail/index2.php" name="formulaire_reclamation">
                                <h4>Information personnelle </h4>

                                <div class="row ligne">


                                    <label>Nom</label>
                                    <input type="text" name="nom" id="nom_reclamation">
                                    <div class=" obligatoire" id="nom_reclamation1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>


                                </div>
                                <div class="row ligne">
                                    <label>Prenom</label>
                                    <input type="text" name="prenom" id="prenom_reclamation">
                                    <div class=" obligatoire" id="prenom_reclamation1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Telephone</label>
                                    <input type="number" min="0" name="telephone" id="telephone_reclamation">
                                    <div class=" obligatoire" id="telephone_reclamation1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="row ligne">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email_reclamation">
                                    <div class=" obligatoire"  id="email_reclamation1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                

                                <br><br>
                                <h4>Concernant le produit</h4>
                                
                                <div class="row ligne">
                                    <label>Objet</label>
                                    <input type="text" name="objet" id="objet_reclamation">
                                    <div class=" obligatoire" id="objet_reclamation1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="label">
                                    <label>Message</label>
                                    <textarea id="description_reclamation" name="message"></textarea>
                                    <div class=" obligatoire" id="description_reclamation1">
                                        <p>veuillez remplir ce champ</p>
                                    </div>
                                </div>
                                <div class="label"><br><br>
                                 <input type="button" id="bouton_connexion" value="Envoyer" onclick="test_reclamation();">
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