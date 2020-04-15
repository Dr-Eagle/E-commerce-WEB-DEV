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
            <div class="affichage">
                <h2>Tous les produits</h2>
                <div class="option_ajout">
                    <label for="">option :</label><a href="ajout_produit.php">Ajouter un Produit</a>  
                </div>
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>

                <table>
                   <td>
                <div class="form-group">
                    <input class="form-control" type="text" id="recherche-produit" placeholder="Rechercher produit">
                    <div style="margin-top: calc(50% - 50px)">
                    <a><div id="resulta-recherche"></div></a>
                    </div> 

                <div>
                    <form method="post" action="tri_produit.php">
                        <div class="form-group">
                            <label for="trii"></label>
                            <select class="custom-select from-control-sm" name="trii" id="trii">
                            <option value="nom">Nom produit </option>
                            <option value="prix">Prix </option>
                            </select>
                            <button type="submit">
                                trier
                            </button>
                        </div>
                    </form>

               </div>
              </td>
               </table>
                <form action="" method="post">
                    <table class="table table-striped table-inverse affichage_produit" id="resultat-rech">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="image_produit"><i class="fas fa-file-image"></i></th>
                                <th class="nom">Nom</th>
                                <th class="quantite">Quantite</th>
                                <th class="prix">Prix</th>
                                <th class="categorie_p">Sous-Categorie</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($_POST['trii']=='nom')
                        {
                            $list=produit_core::tri_produit();
                        }else
                        {
                            $list=produit_core::tri_prix_produit();
                        }
                        $produit=$list->fetchall(PDO::FETCH_ASSOC);
						foreach($produit as $pr){
                            $catalogues=$produit1->get_catalogue($pr["id_produit"]);
						?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td><img src="<?php echo $pr['image_produit']; ?>" alt="image"></td>
                                <td><?php echo $pr['nom_produit']; ?>
                                    <div class="option_produit">
                                        <a href="modifier_produit.php?id_prod=<?php echo $pr['id_produit']; ?>">Modifier Produit</a>
                                        <span>|</span>
                                        <a href="/sbs/views/backend/recuperation/supprimer_produit.php?id_po=<?php echo $pr['id_produit']; ?>">Supprimer produit</a>
                                         
                                         <?php
                                            if(!empty($catalogues))
                                            {
                                        ?>
                                        <?= "<span>|</span>"?>
                                        <?='<a href="/sbs/views/backend/recuperation/supprimer_catalogue.php?id_por='?><?php echo $pr['id_produit']; ?><?='">Supprimer catalogue</a>';?>
                                        <?php   
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="option_produit">
                                        <?php
                                            if(empty($catalogues))
                                            {
                                                ?>
                                                <?= '<a href="ajouter_catalogue.php?id_produit='?><?php echo $pr['id_produit']; ?><?='">Ajouter catalogue</a>';?>
                                             <?php   
                                            }
                                        ?>
                                        
                                    </div>
                                </td>
                                <td><?php echo $pr['quantite']; ?></td>
                                <td><?php echo $pr['prix']; ?></td>
								<?php
								foreach($sous_categorie as $var){
								if($var['id_sous_categorie']==$pr['ide_sous_categorie']){
								?>
                                <td><?php echo $var['nom_sous_categorie']; ?></td>
								<?php
								}
								}
								$sousCategorie1=new Sous_categorie_Core();
								$sous_categorie=$sousCategorie1->affiche_sous_categorie();
								?>
                            </tr>
                         <?php
						 }
						 ?>
                        </tbody>
                    </table>
                </form>
                <br />
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>
            </div>


            <!-- pied de page-->

            <div class="footer">
                <p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a></p>
            </div>

            <!-- pied de page-->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

    <script>
    $(document).ready(function(){
    $('#recherche-produit').keyup(function(){
    $('#resultat-rech').html('');
        var utilisateur= $(this).val();
        if(utilisateur != ""){
            $.ajax({
                type: 'GET',
                url: 'recuperation/rechercher_produit.php',
                data: 'user=' + encodeURIComponent(utilisateur),
                success: function(data){
                    if(data != ""){
                          $('#resultat-rech').html(data).fadeIn();
                    
                    }else
                    {
                        document.getElementById('resultat-rech').innerHTML =" <div style='font-size: 20px; text-align:center; margin-top: 10px'> !!</div> "
                    }
                }
            });
        }
        console.log(utilisateur);
    });
    });
    </script>
</body>

</html> 