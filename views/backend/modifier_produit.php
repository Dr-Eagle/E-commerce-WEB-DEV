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
                
                    <?php
                    foreach ($produit as $pr) {
                        if ($pr['id_produit'] == $_GET['id_prod']) {
                            ?>
                    <form action="recuperation/modifier_produit.php?id_prod=<?php echo $pr['id_produit']; ?>" method="post" name="formulaire_produit">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="formulaire">

                                    <div class="label">
                                        <label>Modifier un produit</label>

                                        <input type="text" id="nom_produit" name="nom_produit" placeholder="" value="<?php echo $pr['nom_produit']; ?>">
                                        <?php

                                    }
                                }
                                ?>
                                        <div class="obligatoire" id="nom_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>

                                    <div class="label">
                                        <label>Modifier image du produit</label>
                                        <?php
                                        $produit1 = new Produit_core();
                                        $produit = $produit1->affiche_produit();
                                        foreach ($produit as $pr) {
                                            if ($pr['id_produit'] == $_GET['id_prod']) {
                                                ?>
                                        <table>
                                            <td><input type="file" id="image_produit" class="input_file" name="image_produit"></td>
                                            <td><img src="<?php echo $pr['image_produit']; ?>" alt="image"></td>
                                        </table>
                                        <?php

                                    }
                                }
                                ?>
                                        <div class="obligatoire" id="image_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Modifier la description courte </label>
                                        <?php
                                        $produit1 = new Produit_core();
                                        $produit = $produit1->affiche_produit();
                                        foreach ($produit as $pr) {
                                            if ($pr['id_produit'] == $_GET['id_prod']) {
                                                ?>
                                        <textarea id="description_produit" name="description_courte"><?php echo $pr['description_courte']; ?></textarea>
                                        <?php

                                    }
                                }
                                ?>
                                        <div class="obligatoire" id="description_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <div class="donnee_produit">
                                            <label for="">Donnée produit---</label>
                                            <div class="form-group">
                                                <label for="max_box">Max-box</label>
                                                <?php
                                                $produit1 = new Produit_core();
                                                $produit = $produit1->affiche_produit();
                                                foreach ($produit as $pr) {
                                                    if ($pr['id_produit'] == $_GET['id_prod']) {
                                                        ?>
                                                <select class="custom-select form-control-sm" name="max_box" id="max_box">
                                                    <option value="<?php echo $pr['max_box']; ?>"><?php echo $pr['max_box']; ?></option>
                                                    <option value="aucun">Aucun</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="gold">Gold</option>
                                                    <option value="diamand">Diamond</option>

                                                </select>
                                                <?php

                                            }
                                        }
                                        ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="game_box">Game-box</label>
                                                <?php
                                                $produit1 = new Produit_core();
                                                $produit = $produit1->affiche_produit();
                                                foreach ($produit as $pr) {
                                                    if ($pr['id_produit'] == $_GET['id_prod']) {
                                                        ?>
                                                <select class="custom-select form-control-sm" name="game_box" id="game_box">
                                                    <option value="<?php echo $pr['max_box']; ?>" selected><?php echo $pr['game_box']; ?></option>
                                                    <option value="aucun">Aucun</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="gold">Gold</option>
                                                    <option value="diamand">Diamond</option>
                                                </select>
                                                <?php

                                            }
                                        }
                                        ?>
                                            </div>
                                        </div>

                                        <div class="label zone_tarif">
                                            <label>Tarif régulier</label>
                                            <?php
                                            $produit1 = new Produit_core();
                                            $produit = $produit1->affiche_produit();
                                            foreach ($produit as $pr) {
                                                if ($pr['id_produit'] == $_GET['id_prod']) {
                                                    ?>
                                            <input type="number" name="prix" class="tarif" id="tarif_regulier" value="<?php echo $pr['prix']; ?>">
                                            <?php

                                        }
                                    }
                                    ?>
                                            <span>DT</span>
                                            <div class="obligatoire" id="tarif_regulier1">
                                                <p>veuillez remplir ce champ</p>
                                            </div>
                                            <label>Quantite</label>
                                            <?php
                                            $produit1 = new Produit_core();
                                            $produit = $produit1->affiche_produit();
                                            foreach ($produit as $pr) {
                                                if ($pr['id_produit'] == $_GET['id_prod']) {
                                                    ?>
                                            <input type="number" class="tarif" id="quantite_description" name="quantite" value="<?php echo $pr['quantite']; ?>">
                                            <?php

                                        }
                                    }
                                    ?>
                                            <div class="obligatoire" id="quantite_description1">
                                                <p>veuillez remplir ce champ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <label>Modifier la description detaillée </label>
                                        <?php
                                        $produit1 = new Produit_core();
                                        $produit = $produit1->affiche_produit();
                                        foreach ($produit as $pr) {
                                            if ($pr['id_produit'] == $_GET['id_prod']) {
                                                ?>
                                        <textarea id="description_courte_produit" name="description_detaillee"><?php echo $pr['description_detaillee']; ?></textarea>
                                        <?php

                                    }
                                }
                                ?>
                                        <div class=" obligatoire" id="description_courte_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="label">
                                        <h3>Modifier Categorie</h3>
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
                                                    <?php
                                                    $produit1 = new Produit_core();
                                                    $produit = $produit1->affiche_produit();
                                                    foreach ($produit as $pr) {
                                                        if ($pr['id_produit'] == $_GET['id_prod']) {
                                                            if ($pr['ide_sous_categorie'] == $var['id_sous_categorie']) {
                                                               
                                                                ?>
                                                    <p><input type="checkbox" id="" value="<?= $pr['ide_sous_categorie'];?>" name="ide_sous_categorie" checked><?php echo $var['nom_sous_categorie'];  ?></p>
                                                    <?php

                                                } else {
                                                    ?>
                                                    <p><input type="checkbox" id=""  value="<?= $var['id_sous_categorie'];?>" name="ide_sous_categorie"><?php echo $var['nom_sous_categorie'];  ?></p>
                                                    <?php

                                                }
                                            }
                                        }
                                        ?>
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
                                        <input type="button" value="Modifier  produit" class="publier_input" onclick="test_produit();">

                                    </div>
                                </div>
                            </div>
                    </form>
                    
                    <div class="col">
                        <div class="select_categorie">

                        <?php
                            $produit1 = new Produit_core();
                            $produit = $produit1->affiche_produit();
                            foreach ($produit as $pr) {
                                if ($pr['id_produit'] == $_GET['id_prod']) {
                                    ?>
                            <form action="recuperation/modifier_catalogue.php?id_prod=<?php echo $pr['id_produit']; ?>" method="post" name="formulaire_catalogue">
                                <div class="label">
                                    <?php
                                    $catalogue1 = new Catalogue_core();
                                    $catalogue = $catalogue1->affiche_catalogue();
                                    foreach ($catalogue as $ca) {
                                        if ($pr['id_produit'] == $ca['ide_produit']) {
                                            ?>
                                    <div class="categorie_produit">
                                        <h3>Modifier Image principale</h3>

                                        <table>
                                            <tr>
                                                <td><input type="file" id="image_principale_produit" class="input_file" name="image_principale"></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo $ca['image_principale']; ?>" alt="image"></td>
                                            </tr>
                                        </table>
                                        <div class=" obligatoire" id="image_principale_produit1">
                                            <p>veuillez remplir ce champ</p>
                                        </div>

                                    </div>
                                    <div class="categorie_produit">
                                        <h3>Modifier Image 2</h3>
                                        <table>
                                            <tr>
                                                <td><input type="file" id="image_principale_produit2" name="image_2" class="input_file"></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo $ca['image_2']; ?>" alt="image"></td>
                                            </tr>
                                        </table>

                                        <div class=" obligatoire" id="image_principale_produit21">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="categorie_produit">
                                        <h3>Modifier Image 3</h3>
                                        <table>
                                            <tr>
                                                <td><input type="file" id="image_principale_produit3" name="image_3" class="input_file"></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo $ca['image_3']; ?>" alt="image"></td>
                                            </tr>
                                        </table>

                                        <div class=" obligatoire" id="image_principale_produit31">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <div class="categorie_produit">
                                        <h3>Modifier Image 4</h3>
                                        <table>
                                            <tr>
                                                <td><input type="file" id="image_description_produit" name="image_description" class="input_file"></td>
                                            </tr>
                                            <tr>
                                                <td><img src="<?php echo $ca['image_description']; ?>" alt="image"></td>
                                            </tr>
                                        </table>

                                        <div class=" obligatoire" id="image_principale_produit31">
                                            <p>veuillez remplir ce champ</p>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="publier">
                                        <input type="button" value="Modifier  catalogue" class="publier_input"  onclick="test_catalogue();">

                                    </div>
                                    <?php

                                }
                            }
                            ?>
                                </div>
                            </form>
                            <?php

}
}
?>
                            </div>
                          
                        
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