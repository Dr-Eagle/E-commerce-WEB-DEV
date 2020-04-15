<?php
include "include.php";
include "../../core/Event_core.php";
$evenement=Event_core::afficherdapresid($_GET['id']);
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

            <div class="formulaire_produit">
                <div class="container">
                    <form action="recuperation/modifier_evenement.php?id=<?php echo $event['id_ev']  ?>" method="POST" name="formulaire_produit">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="formulaire">
                                    <h2>Modifier un evenement</h2>
                                    <div class="label">
                                        <label>id</label>
                                        <input disabled="true" value="<?php echo $event['id_ev'] ?>" type="text" id="id_produit" name="id_ev" placeholder="id">
                                        <div class="obligatoire" id="id_event1">
                                           
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                      <div class="label">
                                        <label>Nom</label>
                                        <input value="<?php echo $event['nom_ev'] ?>" type="text" id="nom_produit" name="nom_ev" placeholder="nom de l'evenement">
                                        <div class="obligatoire" id="type_event1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                <div class="label">
                                        <label>Type</label>
                                        <input value="<?php echo $event['type'] ?>" type="text" id="nom_produit" name="type" placeholder="type de l'evenement">
                                        <div class="obligatoire" id="type_event1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Image </label>
                                        <input type="file" id="image_produit" class="input_file" name="image_event">
                                        <input type="hidden" value="<?php echo $event['img'] ?>" name="current_img">
                                        <div class="obligatoire" id="image_event">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                   
                                   <div class="form-group row clearfix">
                        <label for="validite" class="col-sm-4 col-form-label">Date début</label>
                        <div class="col-sm-7">
                            <input value="<?php echo $event['dated'] ?>" type="date" class="form-control" name="validite" id="validite" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row clearfix">
                            <label for="validite" class="col-sm-4 col-form-label">Date fin</label>
                            <div class="col-sm-7">
                                <input value="<?php echo $event['datef'] ?>" type="date" class="form-control" name="validite1" id="validite" placeholder="">
                            </div>
                        </div>
                                      
                                    <div class="label">
                                        <label>Ajouter une description detaillée</label>
                                        <textarea id="description_courte_produit" name="description_detaillee"><?php echo $event['description'] ?></textarea>
                                        <div class=" obligatoire" id="description_courte_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                  
                                        </div>
                                    </div>
                                    <div class="publier">
                                        <input type="submit" value="Modifier un evenement" class="publier_input">

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