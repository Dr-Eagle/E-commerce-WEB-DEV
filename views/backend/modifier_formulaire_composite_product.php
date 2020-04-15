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
            <!-- pied de page-->
            <div class="formulaire_composite ">
                <h2>Modifier un composite product</h2>
                <?php
                foreach($composite_product as $comp){
                    if($comp['id_composite_product']==$_GET['id_comp']){
                        ?>
                <form method="post" action="recuperation/modifier_composite_product.php?id_comp=<?php echo $_GET['id_comp']; ?>" name="formulaire_composite_product">

                    <div class="form-group label" style="display:flex;">
                        <label for="max_box">Type</label>
                        <select class="custom-select form-control-sm" name="type1" id="type">
                            <option value=<?php echo $comp['type1']; ?>><?php echo $comp['type1']; ?></option>
                            <option value="Max Box">Max Box</option>
                            <option value="Game Box">Game Box</option>
                        </select>
                        <div class="obligatoire" id="type1">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>

                    <div class="label">
                        <label>Titre 1</label>
                        <input type="text" name="titre1" id="titre1" value="<?php echo $comp['titre1']; ?>">
                        <div class="clear"></div>
                        <div class="obligatoire" id="titre11">
                            <p>veuillez remplir ce champ</p>
                        </div>

                    </div>
                    <div class="label">
                        <label>Titre 2</label>
                        <input type="text" name="titre2" id="titre2" value="<?php echo $comp['titre2']; ?>">
                        <div class="clear"></div>
                        <div class="obligatoire" id="titre21">
                            <p>veuillez remplir ce champ</p>
                        </div>
                    </div>
                    <div class="composite">
                        <div class="compo">
                            <div class="label">
                                <label>Nom option 1</label>
                                <input type="text" name="nom_option1" id="nom_option1" value="<?php echo $comp['nom_option1']; ?>">
                                <div class="clear"></div>
                                <div class="obligatoire" id="nom_option11">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label block">
                                <label>image</label>
                                <input type="file" name="image_option1" id="image_option1">
                                <div class="clear"></div>
                                <div class="obligatoire" id="image_option11">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label">
                                <label>Description </label>
                                <textarea name="description_option1" id="description_option1" cols="30" rows="10"><?php echo $comp['description_option1']; ?></textarea>
                                <div class="clear"></div>
                                <div class="obligatoire" id="description_option11">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label">
                                <label>Prix</label>
                                <input type="number" name="prix_option1" id="prix_option1" value="<?php echo $comp['prix_option1']; ?>">
                                <div class="clear"></div>
                                <div class="obligatoire" id="prix_option11">
                                    <p>veuillez remplir ce champ</p>
                                </div>

                            </div>
                        </div>
                        <div class="compo">
                            <div class="label">
                                <label>Nom option 2</label>
                                <input type="text" name="nom_option2" id="nom_option2" value="<?php echo $comp['nom_option2']; ?>">
                                <div class="clear"></div>
                                <div class="obligatoire" id="nom_option21">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label block">
                                <label>image</label>
                                <input type="file" name="image_option2" id="image_option2">
                                <div class="clear"></div>
                                <div class="obligatoire" id="image_option21">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label">
                                <label>Description </label>
                                <textarea name="description_option2" id="description_option2" cols="30" rows="10"><?php echo $comp['description_option2']; ?></textarea>
                                <div class="clear"></div>
                                <div class="obligatoire" id="description_option21">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label">
                                <label>Prix</label>
                                <input type="number" name="prix_option2" id="prix_option2" value="<?php echo $comp['prix_option2']; ?>">
                                <div class="clear"></div>
                                <div class="obligatoire" id="prix_option21">
                                    <p>veuillez remplir ce champ</p>
                                </div>

                            </div>
                        </div>
                        <div class="compo">
                            <div class="label">
                                <label>Nom option 3</label>
                                <input type="text" name="nom_option3" id="nom_option3" value="<?php echo $comp['nom_option3']; ?>">
                                <div class="clear"></div>
                                <div class="obligatoire" id="nom_option31">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label block">
                                <label>image</label>
                                <input type="file" name="image_option3" id="image_option3">
                                <div class="clear"></div>
                                <div class="obligatoire" id="image_option31">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label">
                                <label>Description </label>
                                <textarea name="description_option3" id="description_option3" cols="30" rows="10"><?php echo $comp['description_option3']; ?></textarea>
                                <div class="clear"></div>
                                <div class="obligatoire" id="description_option31">
                                    <p>veuillez remplir ce champ</p>
                                </div>
                            </div>
                            <div class="label">
                                <label>Prix</label>
                                <input type="number" name="prix_option3" id="prix_option3" value="<?php echo $comp['prix_option3']; ?>">
                                <div class="clear"></div>
                                <div class="obligatoire" id="prix_option31">
                                    <p>veuillez remplir ce champ</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="label">
                        <input type="button" id="bouton_ajouter" value="Modifier " onclick="text_formulaire_composite();">
                    </div>


                </form>
                <?php
                    }
                }
                ?>
            </div>



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