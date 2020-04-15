<?php
include "include.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="ta_feuille_de_style.css" type="text/css" media="screen" >


     


<?php
    include 'tete.php';
    ?>
    <script>
        function compar()
        {
            var sdate1 = document.getElementById('validite').value;
            var sdate2 = document.getElementById('validite1').value;
            console.log(sdate1);
            if(sdate1>sdate2)
            {
                alert('date incorrect');
            }
        }
    </script>

  

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

            <div class="formulaire_produit">
                <div class="container">
                    <form action="recuperation/ajouter_evenement.php" method="POST" name="formulaire_evenement">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="formulaire">
                                    <h2>Ajouter un evenement</h2>
                                    <div class="label">
                                        <label>ID</label>
                                        <input type="number" id="id_produit" name="id_ev" placeholder="ID" required="">
                                        <div class="obligatoire" id="id_event1">
                                           
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                      <div class="label">
                                        <label>Nom</label>
                                        <input type="text" id="nom_produit" name="nom_ev" placeholder="nom de l'evenement" required="">
                                        <div class="obligatoire" id="type_event1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                        
                                <div class="label">
                                        <label>Type</label>
                                        <input type="text" id="nom_produit" name="type" placeholder="type de l'evenement" required="">
                                        <div class="obligatoire" id="type_event1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Image </label>
                                        <input type="file" id="image_produit" class="input_file" name="image_event" required="">
                                        <div class="obligatoire" id="image_event">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                   
                                   <div class="form-group row clearfix">
                        <label for="validite" class="col-sm-4 col-form-label">Date début</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" name="validite" id="validite" placeholder="" required="">
                        </div>
                    </div>
                    <div class="form-group row clearfix">
                            <label for="validite" class="col-sm-4 col-form-label">Date fin</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="validite1" id="validite1" placeholder="" required="">
                            </div>
                        </div>
                         <div id="map"></div>


                       
                                      
                                    <div class="label">
                                        <label>Description</label>
                                        <textarea id="description_courte_produit" name="description_detaillee" onclick="compar()" required="" ></textarea>
                                        <div class=" obligatoire" id="description_courte_produit1" >
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                  
                                        </div>
                                    </div>
                                    <div class="publier">
                                        <input type="submit" value="Ajouter un evenement" class="publier_input"  >

                                    </div>
                                </div>
                            </div>

                           
    
                    </form>
                </div>

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
<script>
        function compar()
        {
            var sdate1 = document.getElementById('validite').value;
            var sdate2 = document.getElementById('validite1').value;
            console.log(sdate1);
            if(sdate1>sdate2)
            {
                alert('date incorrect');
            }
        }
    </script>

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