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

<?php
    include "entete.php";
    ?>

	<div class="super_container">
        <!-- Menu de gauche-->

        <?php
        include "menu.php";
        ?>
        <!-- Menu de gauche-->

        <div class="space_work">

			<div class="container">
				<div class="formulaire_livraison">
								<h3>Ajout d'une Facture</h3>

								<form method="post" action="recuperation/ajouter_facture.php" name="formulaire_livraison">

									<div class="select_livreur liv">
									
										<label for="livraison">Commande N°= </label>
										<select name="ide_commande" id="livrai">
										<?php
											foreach($commande as $com){
											
										?>
											<option value="<?php echo $com['id_commande']; ?>"><?php echo $com['id_commande']; ?></option>
										<?php
										}
										
										?>
										</select>
										<div class="obligatoire" id="livrai1"></div>
									

									</div>

									<div class="label">
										<input type="buttom" id="bouton_ajout" value="Ajouter" onclick="test_livreur();"> 
									</div>
                                
								
								</form>
							
							</div>
			</div>
			

		<div class="footer">
                <p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a></p>
     </div>
		</div>
		
	</div>
	

</div>



        <!-- pied de page-->
    
    


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


	
					

							
						
					
				
				
