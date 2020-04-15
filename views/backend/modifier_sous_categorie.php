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
            <div class="formulaire_produit categorie">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="incident">Modifier une sous categorie</h2>
                            <?php
										foreach($sous_categorie as $Scat){
										if($Scat['id_sous_categorie']==$_GET['id_sous_cat']){
									?>
                            <form action="recuperation/modifier_sous_categorie.php?id_sous_cat=<?php echo $Scat['id_sous_categorie']; ?>" method="post" name="formulaire_sous_categorie">
                                <div class=" label">
                                    <label for="nom_sous_categorie">Nom de la sous categorie</label>
									
                                    <input type="text" name="nom_sous_categorie" id="nom_sous_categorie" value="<?php echo $Scat['nom_sous_categorie']; ?>">
									<?php
									}
									}
									?>
                                    <div class=" obligatoire" id="nom_sous_categorie1">
                                        <p>vous avez oublié le nom de la sous categorie</p>
                                    </div>
                                </div>
                                <div class=" label">
                                    <label for="lien_sous_categorie">lien sous categorie</label>
									<?php
									$sousCategorie1=new Sous_categorie_Core();
									$sous_categorie=$sousCategorie1->affiche_sous_categorie();
										foreach($sous_categorie as $Scat){
										if($Scat['id_sous_categorie']==$_GET['id_sous_cat']){
									?>
                                    <input type="text" name="lien_sous_categorie" id="lien_sous_categorie" value="<?php echo $Scat['lien_sous_categorie']; ?>">
									<?php
									}
									}
									?>
                                    <div class=" obligatoire" id="lien_sous_categorie1">
                                        <p>vous avez oublié le lien de la sous categorie</p>
                                    </div>
                                </div>
                                <div class="select_sous_cat ">
                                    <label for="sous_categorie">Categorie parent ---</label>
                                    <select name="ide_categorie" id="categorie_parent">
									<option value="aucune">aucune</option>
										<?php
									$sousCategorie1=new Sous_categorie_Core();
									$sous_categorie=$sousCategorie1->affiche_sous_categorie();
										foreach($sous_categorie as $Scat){
										if($Scat['id_sous_categorie']==$_GET['id_sous_cat']){
                                            $categorie1=new Categorie_core();
                                            $categorie=$categorie1->affiche_categorie();
										foreach($categorie as $nom_categorie){
										if($Scat['ide_categorie']==$nom_categorie['id_categorie']){
										?> 
										<option value="<?php echo $nom_categorie['id_categorie']; ?>" selected><?php echo $nom_categorie['nom_categorie']; ?></option>
										<?php
										}
										?>
                                        <option value="<?php echo $nom_categorie['id_categorie']; ?>"><?php echo $nom_categorie['nom_categorie']; ?></option>
										<?php 
										}
										}
										}
										?>
                                    </select>
                                    <div class=" obligatoire" id="categorie_parent1">
                                        <p></p>
                                    </div>
                                </div>
                                <br><br>

                                <div class="publier">
                                    <input type="button" value="Modifier sous categorie" class="publier_input" onclick="test_sous_categorie();">
                                </div>
                            </form>
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