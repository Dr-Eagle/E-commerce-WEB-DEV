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
        include "entete_imprimer.php";
    ?>

    <!-- Entete-->

    <div class="super_container">
        <!-- Menu de gauche-->


        <div class="space_work">
            <!-- body-->

            <div class="ajout_utlisateur">
                
                <div class="container">
                    <br> <br>
             
					<table>
					<?php
					foreach($facture as $fac){
					if($fac['id_facture']==$_GET['id_faci']){
					$commande1 = new Commande_core();
					$commande = $commande1->affiche_commande();
					foreach($commande as $com){
					if($fac['ide_commande']==$com['id_commande']){
					?>
					<tr>
					
                    <form action="" method="post">
                        <h2>Facture N°=<?php echo $fac['id_facture']; ?></h2>
						<div class="option_produit">
                                        <input type="button" value="Imprimer" onclick="window.print()">       
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label for="login_utilisateur">Nom et Prenom du client</label>
                            <input type="text" name="login_utilisateur" id="login_utilisateur" class="form-control" value="<?php echo $com['nom_client']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $com['prenom_client']; ?>" disabled>
                            
                        </div>
                        <div class="form-group">
                            <label for="nom_utilisateur">Adresse du Client</label>
                            <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" value="<?php echo $com['adresse_livraison']; ?>" disabled>

                        </div>
                        <div class="form-group">
                            <label for="prenom_utilisateur">Ville du client</label>
                            <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control" value="<?php echo $com['ville']; ?>" disabled>
                            
                        </div>
						<div class="form-group">
                            <label for="prenom_utilisateur">telephone du client</label>
                            <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control" value="<?php echo $com['telephone']; ?>" disabled>
                            
                        </div>
						<div class="form-group">
                            <label for="prenom_utilisateur">Mode de paiement</label>
                            <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control" value="<?php echo $com['mode_paiement']; ?>" disabled>
                            
                        </div>
                        <div class="form-group">
                            <label for="prenom_utilisateur">Prix</label>
							<?php
							$panier1 = new Panier_core();
							$panier = $panier1->affiche_panier();
							foreach($panier as $pa){
							if($pa['id_panier']==$com['ide_panier']){
							?>
                            <input type="text" name="prenom_utilisateur" id="prenom_utilisateur" class="form-control" value="<?php echo $pa['prix_total']; ?>" disabled>
							<?php
							}
							}
							?>
                            
                        </div>
                        
                    </form>

					</tr>
					<?php
					}
					}
					}
					}
					?>
					</table>
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