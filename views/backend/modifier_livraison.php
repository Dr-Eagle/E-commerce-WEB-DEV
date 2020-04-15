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
								<h3>Modifier une livraison</h3>
								<?php
								foreach($livraison as $li){
								if($li['id_livraison']==$_GET['id_liv']){
								?>
								<form method="post" action="recuperation/modifier_livraison.php?id_liv=<?php echo $li['id_livraison']; ?>" name="formulaire_livraison">

									<div class="select_livreur liv">
									
										<label for="livraison">Facture ---</label>
										<select name="ide_facture" id="livrai">
										<?php
											foreach($facture as $fac){
											if($fac['id_facture']==$li['ide_facture']){

										?>
											<option value="<?php echo $fac['id_facture']; ?>" selected><?php echo $fac['id_facture']; ?></option>
										<?php
										}else{
										?>
											<option value="<?php echo $fac['id_facture']; ?>" ><?php echo $fac['id_facture']; ?></option>
										<?php
										}
										}
										?>
										</select>
										<div class="obligatoire" id="livrai1"></div>
									

									</div>

									
									<div class="select_livreur liv">
									
										<label for="livraison">Nom Livreur ---</label>
										<select name="nom_livreur" id="livrai">
										<?php
											foreach($livreur as $liv){
											if($liv['id_livreur']==$li['ide_livreur']){
										?>
											<option value="<?php echo $liv['nom_livreur']; ?>" selected><?php echo $liv['nom_livreur']; ?></option>
										<?php
											}else{
										?>
											<option value="<?php echo $liv['nom_livreur']; ?>" ><?php echo $liv['nom_livreur']; ?></option>
										<?php
										}
										}
										?>
										</select>
										 <div class="obligatoire" id="livrai1"></div>
									
									
									</div>

									<div class="select_livreur liv">
									
										<label for="livraison">ETAT -----</label>
										<select name="etat" id="livrai">
										
											<option>En livraison</option>
											<option>Terminer</option>
										
										</select>
										 <div class="obligatoire" id="livrai1"></div>
									
									
									</div>
									
									<div class="label">
										<input type="buttom" id="bouton_ajout" value="Modifier" onclick="test_livreur();"> 
									</div>
                                
								
								</form>
							<?php
							}
							}
							?>
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


	
					

							
						
					
				
				
