<?php
session_start();
if(isset($_SESSION['admin'])){
    include 'include.php';
    ?>
</head>

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
                <h2>Toutes les livraisons</h2>
				<table>
				<td>
                <div class="option_ajout">
                    <label for="">option :</label><a href="formulaire_livraison.php">Ajouter une Livraison</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
				</td>
				<td>
				<div class="option_ajout">
                    <form action="recuperation/rechercher_livraison.php" method="post"><input  class="form-control" type="text" name="recherche" placeholder="Numero" ><input type="submit" class="button" value="Rechercher une Livraison"> </form>
					<?php if($_GET['id_lvr']==1000){ ?><p> cette livraison n'existe pas !!</p><?php } ?>
				
                </div>
				</td>
				</table>
                <div class="navigation">
                    <button type="submit">
                        <</button> <span>---</span>
                            <button type="submit">></button>
                            <div class="clear"></div>
                </div>
                <form action="" method="post">
                    <table class="table table-striped table-inverse affichage_produit">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="nom_utilisateur">ID_livraison</th>
                                <th class="nom_utilisateur">Numero Facture</th>
                                <th class="Adresse_Messagerie">Nom Livreur</th>
                                <th class="Type_client">Etat</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
						if($_GET['id_lvr']!=0){
						foreach($livraison as $li){
						if($li['id_livraison']==$_GET['id_lvr']){
						?>
                            <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td>
                                    <h4><?php echo $li['id_livraison']; ?></h4>
                                    <div class="option_produit">
										<?php
										if($li['etat']=="En livraison"){
										?>
                                        <a href="modifier_livraison.php?id_liv=<?php echo $li['id_livraison']; ?>">Modifier</a>
										<span>|</span>
										<a href="sendmail/index.php?id_li=<?php echo $li['ide_livreur']."&id_fa=".$li['ide_facture']; ?>" name="mailform">Envoyer mail au livreur</a>
										<?php
										}
										if($li['etat']=="Terminer"){
										?>
										
                                        <a href="recuperation/supprimer_livraison.php?id_liv=<?php echo $li['id_livraison']; ?>">Supprimer</a>
										<?php } ?>
                                    </div>
                                </td>
                                <td><?php echo $li['ide_facture']; ?> </td>
								<?php
								$livreur1 = new Livreur_core();
								$livreur = $livreur1->affiche_livreur();
								foreach($livreur as $liv){
								if($liv['id_livreur']==$li['ide_livreur']){
								?>
                                <td><?php echo $liv['nom_livreur']; ?></td>
								<?php
								}
								}
								?>
                                <td><?php echo $li['etat']; ?></td>
                            </tr>
						<?php
						}}}
						if($_GET['id_lvr']==0){
						foreach($livraison as $li){
						?>
						 <tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td>
                                    <h4><?php echo $li['id_livraison']; ?></h4>
                                    <div class="option_produit">
										<?php
										if($li['etat']=="En livraison"){
										?>
                                        <a href="modifier_livraison.php?id_liv=<?php echo $li['id_livraison']; ?>">Modifier</a>
										<span>|</span>
										<a href="sendmail/index.php?id_li=<?php echo $li['ide_livreur']."&id_fa=".$li['ide_facture']; ?>" name="mailform">Envoyer mail au livreur</a>
										<?php
										}
										if($li['etat']=="Terminer"){
										?>
										
                                        <a href="recuperation/supprimer_livraison.php?id_liv=<?php echo $li['id_livraison']; ?>">Supprimer</a>
										<?php } ?>
                                    </div>
                                </td>
                                <td><?php echo $li['ide_facture']; ?> </td>
								<?php
								$livreur1 = new Livreur_core();
								$livreur = $livreur1->affiche_livreur();
								foreach($livreur as $liv){
								if($liv['id_livreur']==$li['ide_livreur']){
								?>
                                <td><?php echo $liv['nom_livreur']; ?></td>
								<?php
								}
								}
								?>
                                <td><?php echo $li['etat']; ?></td>
                            </tr>
							<?php 
							}}
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

<?php
}
else{
	header("location:formulaire_connexion.php");
}