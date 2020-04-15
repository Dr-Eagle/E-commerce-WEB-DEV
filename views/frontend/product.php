<?php
session_start();
include "include.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<?php 
	include 'tete.php';
	?>

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<?php
        include "entete.php";
    ?>

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<?php
					foreach($produit as $pr){
					if($pr['id_produit']==$_GET['id_pro']){
						$catalogue1=new Catalogue_core();
						$catalogue=$catalogue1->affiche_catalogue();
						foreach($catalogue as $ca){
						if($ca['ide_produit']==$pr['id_produit']){
					?>
				<div class="col-lg-2 order-lg-1 order-2">

					<ul class="image_list">
					
						<li data-image="<?php echo $ca['image_principale']; ?>"><img src="<?php echo $ca['image_principale']; ?>" alt=""></li>
						<li data-image="<?php echo $ca['image_2']; ?>"><img src="<?php echo $ca['image_2']; ?>" alt=""></li>
						<li data-image="<?php echo $ca['image_3']; ?>"><img src="<?php echo $ca['image_3']; ?>" alt=""></li>
					
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="<?php echo $ca['image_principale']; ?>" alt=""></div>
				</div>
				<?php
					}
					}
					}
					}
					?>
				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
					<?php
					$produit1=new Produit_core();
					$produit=$produit1->affiche_produit();
					foreach($produit as $pr){
					if($pr['id_produit']==$_GET['id_pro']){
						
						foreach($sous_categorie as $sc){
						if($sc['id_sous_categorie']==$pr['ide_sous_categorie']){
					?>
						<div class="product_category"><?php echo $sc['nom_sous_categorie']; ?></div>
						<?php
						}
						}
						?>
						<div class="product_name"><?php echo $pr['nom_produit']; ?></div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p><?php echo $pr['description_courte']; ?></p></div>
						
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<!--<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>
									-->
									

								</div>
								<div class="product_price"><?php echo $pr['prix']; ?> DT</div>
								
								<div class="button_container">
									<a class="add_to_cart" href="recuperation/panier_add.php?id_produit=<?=$pr['id_produit'];?>"><button type="button" class="button cart_button">Ajouter au panier</button></a>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
						<?php	
						}
						}
						?>
					
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--Description detaillee-->
	<div>
		<div><center><h2>Description detaillee</h2></center></div>
		<div>
			<?php
					$produit1=new Produit_core();
					$produit=$produit1->affiche_produit();
					foreach($produit as $pr){
					if($pr['id_produit']==$_GET['id_pro']){
					$catalogue1=new Catalogue_core();
						$catalogue=$catalogue1->affiche_catalogue();
						foreach($catalogue as $ca){
						if($ca['ide_produit']==$pr['id_produit']){
			?>
			<center>

				<table class="table table-striped table-inverse descrip">
						<tbody>
							<tr>
								<td><p><?php echo $pr['description_detaillee']; ?></p></td>
								<td><img src="<?php echo $ca['image_description']; ?>" alt="image description"></td>
							</tr>
						</tbody>
				</table>
			</center>
			<?php
			}
			}
			}
			}
			?>
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
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/product_custom.js"></script>
<script src="js/script_additionnel.js"></script>
</body>

</html>