
<?php
$panier = new Panier_core();
$ligne_panier_core = new Ligne_panier_core();
$historique_core=new Historique_core();

?>
<?php
	$code_promo_core=new Code_promo_core();
	if(isset($_POST['code_promo']) && $code_promo_core->is_valide_code($_POST['code_promo']))
	{
		
		$codes=$code_promo_core->get_code_promo($_POST['code_promo']);
		if(!empty($codes) && $code_promo_core->is_valide_code($_POST['code_promo']))
		{
			$panier->set_ide_code($_SESSION['panier'],$codes[0]->id_code);
		}
	}
	else
	{
		$codes=new Code_promo(NULL,"","","");
	}  
?>
<?PHP

$categorie1=new Categorie_core();
$categorie=$categorie1->affiche_categorie();

$catalogue1=new Catalogue_core();
$catalogue=$catalogue1->affiche_catalogue();

$sousCategorie1=new Sous_categorie_Core();
$sous_categorie=$sousCategorie1->affiche_sous_categorie();

$produit1=new Produit_core();
$produit=$produit1->affiche_produit();

$client1=new Client_core();
$client=$client1->affiche_client();

$selection_produit_compose=new Selection_produit_compose_core();

$composite_product1_core = new composite_product_core();
$composite=$composite_product1_core->affiche_Composite_product();

$avis1=new avis_core();
$avis=$avis1->affiche_avis();
//var_dump($listeEmployes->fetchAll());
?>


<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"></div>Boutique SBS Informatique</div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a target="_blank" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.google.com%2Fmaps%2Fplace%2FSBS%2BINFORMATIQUE%2F%4036.8447273%2C10.1953173%2C17z%2Fdata%3D!3m1!4b1!4m5!3m4!1s0x12fd34c68f17a1c7%3A0xe5cae0c75d2d1259!8m2!3d36.844723!4d10.197506%3Ffbclid%3DIwAR0ucQLxHoO3eiZ24ho18jE_jRZgrLu9hp-yvLHMX8mErDf2gG8dAp-gk70&h=AT3VNkB8uURcZJOkUR13XAcix8Tcr8sId3TD7RoL_dsSR-noweAlh7dC1-JPCJ1VWNxx1XxEhCHmu94v4XBpl1S-EDwH_PXUgY58drA6ony3jwrmiiFHG5VqTW0GLz30LJBVaw">Localisation<i class="fas fa-chevron-down"></i></a>
									
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="espace_client.php">Mon Compte</a></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="index.php"><img src="images/logo.png" alt="logo"/></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="affiche_sous_categorie.php" class="header_search_form clearfix" method="GET">
										<input type="search" name="valeur" required="required" class="header_search_input" placeholder="Rechercher ici...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
												<?php 
												
												foreach($categorie as $c){
												?>
													<li><a class="clc" href="#"><?php echo $c['nom_categorie']; ?></a></li>
												<?php
												}
												$categorie1=new Categorie_core();
												$categorie=$categorie1->affiche_categorie();
												?>
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Favoris</a></div>
									<div class="wishlist_count">115</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<a href="cart.php">
									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span><?= $panier->count_items($_SESSION['panier']); ?></span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="cart.php">Panier</a></div>
										<div class="cart_price"><span><?= $panier->total_panier($_SESSION['panier']); ?></span> TND</div>
									</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu-->

							<!-- Main Nav Menu -->

							<div class="menu">
							
								
								<ul>
								<?php 
								foreach($categorie as $va){
								?>
									<li>
										<a href="<?PHP echo $va['lien_categorie']; ?>?id_cate=<?php echo $va['id_categorie']. "&id_sc=9" ."&id_prA=0"; ?>" class="first"><?PHP echo $va['nom_categorie']; ?>&nbsp;<i class="fas fa-chevron-circle-down"></i></a>
										
										<ul>
										<?php 
										
										foreach($sous_categorie as $var){
											if($var['ide_categorie']==$va['id_categorie']){
											?>
											<li><a href="<?php echo $var['lien_sous_categorie']; ?>?id_sousC=<?php echo $var['id_sous_categorie']; ?>"><?PHP  echo $var['nom_sous_categorie'];  ?></a></li>
											
											<?php
											} 
										}
										$sousCategorie1=new Sous_categorie_Core();
										$sous_categorie=$sousCategorie1->affiche_sous_categorie();
										?>
											
										</ul>
										
									</li>
									<?php 
								}
								?>
								</ul>
								
							</div>

							<!-- Menu Trigger -->
							<div class="responsive_menu">
								<i class="fas fa-bars"></i>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

	</header>
	
	
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none !important;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
  </button>
  <strong></strong> <a href="#" class="alert-link"></a>
</div>

<!--<script>
  $(".alert").alert();
</script>-->

