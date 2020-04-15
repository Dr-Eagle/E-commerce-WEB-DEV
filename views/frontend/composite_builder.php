<?php
session_start();
if(!isset($_SESSION['builder']))
{
    $_SESSION['builder']=array();
}
include "include.php";
?>
<?php
     $composite_selection=new Composite_selection();
     $sous_cate=$composite_selection->get_sous_categorie("Composants");
     $produits_cate=$composite_selection->get_produit__categorie("Composants");
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "tete.php";

    ?>
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/composite.css">
</head>

<body>

    <div class="super_container">
        <!-- Header -->
        <?php
        include "entete.php";

        ?>

        <div class="container">

				<div>
					<div><center><h2><u>SBS CONFIGURATEUR</u></h2></center></div>
					</br></br>
					<div><center><h3>Configurez votre pc ici &nbsp;&nbsp;<i class="fas fa-chevron-circle-down"></i></h3></center></div>
					</br></br>
				</div>
            <div class="product_builder">
                <div class="bloc sous_categorie">
                    <ul>
					<?php 
					foreach($sous_cate as $sc):
					?>
                        <li><a class="" data-id_sc="<?= $sc->id_sous_categorie ; ?>" href="#"><?= $sc->nom_sous_categorie; ?></a></li>
						</br>
                     <?php endforeach ?>
                    </ul>
                </div>
                <div class="bloc produit_sous_categorie">
				<?php
				foreach($produits_cate as $pr):
				
				?>
                    <a href="#" data-id_sc="<?= $pr->ide_sous_categorie;?> "data-id_produit="<?= $pr->id_produit;?>" class="hidden">
                        <div class="images">
                            <div class="ima">
                                <img src="<?php echo $pr->image_produit; ?>" alt="">
                                <p class="pri" ><?php echo $pr->prix; ?> TND</p>
                                <div class="clear"></div>
                            </div> 
							<div><?php echo $pr->nom_produit; ?></div>
                            <p><?php echo $pr->description_courte; ?></p>
							<HR>
                        </div>
                    </a>
                <?php
                endforeach
				?>
                </div>
                <div class="bloc">
                    <div class="composant">
                        <div class="options">
                            <?php
                                foreach ($sous_cate as $sc):               
                                ?>
                                    <div class="option hidden" data-id_sc="<?=$sc->id_sous_categorie;?>">
                                    <img src="" alt="">
                                    <div class="descri">
                                        <p class="nom_produit"></p>
                                        <p class="prix_single" data-prix""></p>
                                    </div>
                                    <div class="difference_prix">
                                        <a href="#" class="delete"><i class="fas fa-times-circle"></i></a>
                                    </div>
									
                                    </div>
                            <?php
                                endforeach
                            ?>
                            <div class="ajout_panier_builder">
                                <div class="element prix_total"><strong class="h3"></strong> TND</div>
                                <div class="element" ><a href="#" id="builder_to_cart"class="btn btn-primary">Ajouter au panier</a></div>
                            </div>
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
    <script src="js/script_additionnel.js"></script>
    <script src="js/custom.js"></script>
</body>

</html> 