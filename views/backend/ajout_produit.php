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
            <!-- body-->

            <div class="formulaire_produit">
                <div class="container">
                    <form action="recuperation/ajouter_produit.php" method="post" name="formulaire_produit">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="formulaire">

                                    <div class="label">
                                        <label>Ajouter un produit</label>
                                        <input type="text" id="nom_produit" name="nom_produit" placeholder="Nom du produit">
                                        <div class="obligatoire" id="nom_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>

                                    <div class="label">
                                        <label>Image du produit</label>
                                        <input type="file" id="image_produit" class="input_file" name="image_produit">
                                        <div class="obligatoire" id="image_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Ajouter une description courte </label>
                                        <textarea id="description_produit" name="description_courte"></textarea>
                                        <div class="obligatoire" id="description_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <div class="donnee_produit">
                                            <label for="">Donnée produit---</label>
                                            <div class="form-group">
                                                <label for="max_box">Max-box</label>
                                                <select class="custom-select form-control-sm" name="max_box" id="max_box">
                                                    <option value="aucun">Aucun</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="gold">Gold</option>
                                                    <option value="diamand">Diamond</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="game_box">Game-box</label>
                                                <select class="custom-select form-control-sm" name="game_box" id="game_box">
                                                    <option value="aucun">Aucun</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="gold">Gold</option>
                                                    <option value="diamand">Diamond</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="label zone_tarif">
                                            <label>Tarif régulier</label>
                                            <input type="number" name="prix" class="tarif" id="tarif_regulier">
                                            <span>DT</span>
                                            <div class="obligatoire" id="tarif_regulier1">
                                                <p>veuillez remplir ce champ</p>
                                            </div>
                                            <label>Quantite</label>
                                            <input type="number" class="tarif" id="quantite_description" name="quantite">
                                            <div class="obligatoire" id="quantite_description1">
                                                <p>veuillez remplir ce champ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Ajouter une description detaillée</label>
                                        <textarea id="description_courte_produit" name="description_detaillee"></textarea>
                                        <div class=" obligatoire" id="description_courte_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <h3>selectionnez une categorie</h3>
                                        <div class="block_categorie" id="block_categorie">
                                            <div class="categorie_produit">
                                                <?php
                                                foreach ($categorie as $va) {
                                                    ?>
                                                <span><?php echo $va['nom_categorie']; ?></span>

                                                <div class="sous_categorie_produit">
                                                    <?php
                                                    foreach ($sous_categorie as $var) {
                                                        if ($va['id_categorie'] == $var['ide_categorie']) {
                                                            ?>
                                                    <p><input type="checkbox" id="" name="nom_sous_categorie" value="<?php echo $var['nom_sous_categorie']; ?>"><?php echo $var['nom_sous_categorie']; ?></p>
                                                    <?php

                                                }
                                            }
                                            $sousCategorie1 = new Sous_categorie_Core();
                                            $sous_categorie = $sousCategorie1->affiche_sous_categorie();
                                            ?>
                                                </div>
                                                <?php

                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <div class=" obligatoire" id="block_categorie1">
                                            <p>selectionnez une categorie</p>
                                        </div>
                                    </div>
                                    <div class="publier">
                                        <input type="button" value="Ajouter un produit" class="publier_input" onclick="test_produit();">

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