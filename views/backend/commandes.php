<?php
include "include.php";
?>
<?php
$commande1 = new Commande_core();
$groupe_commande = $commande1->get_orders(1,2);
//var_dump($groupe_commande);
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
			<div class="affichage">
				<h2>Toutes les Commandes</h2>

				<div class="navigation">
					
					<button type="button" id="" >
						<</button> <span>---</span>
							<button type="button" id="" >></button>
							<div class="clear"></div>
				</div>
				<div class="form-group">
                <label for="">Nombres de commandes à afficher</label>
                <select class="custom-select" name="" id="nbre_elements">
                    <option selected>10</option>
                    <option value="1">1</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="60">60</option>
                    <option value="80">80</option>
                    <option value="100">100</option>

                </select>
            </div>

				<form action="" method="post">
					<table class="table table-striped table-inverse affichage_produit">
						<thead class="thead-inverse">
							<tr>
								<th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher">
								</th>
								<th class="nom_utilisateur">Id Commande</th>
								<th class="nom_utilisateur">Nom Client</th>
								<th class="nom_utilisateur">Ville</th>
								<th class="nom_utilisateur">Adresse de livraison</th>
								<th class="nom_utilisateur">Etat</th>
								<th class="nom_utilisateur">Telephone</th>
								<th class="nom_utilisateur">Mode de paiement</th>
							</tr>
						</thead>
						<tbody class="commmande">
							<?php 
								foreach ($groupe_commande as $key => $commande) {
								# code...
							
									foreach ($commande as $com){
							?>
										<tr class="commande hidden">
											<td scope="row" class="coche"><input type="checkbox" name="" id="">
											</td>
											<td>
												<h4>
													<?php echo $com->id_commande; ?>
												</h4>
												<div class="option_produit valider_commande">
													<a href="recuperation/modifier_etat_commande.php?id_com=<?php echo $com->id_commande."&statut=validée "; ?>"><?= ($com->etat=='validée')?'': "Valider" ?></a>
													<span><?= ($com->etat=='en attente')?'|': "" ?></span>
													<a href="recuperation/modifier_etat_commande.php?id_com=<?php echo $com->id_commande."&statut=annulée "; ?>"><?= ($com->etat=='annulée')?'': "Annuler" ?></a>
												</div>
											</td>
											<td>
												<?php echo $com->nom_client; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<?php echo $com->prenom_client; ?>
											</td>
											<td>
												<?php echo $com->ville; ?>
											</td>
											<td>
												<?php echo $com->adresse_livraison; ?>
											</td>
											<td>
												<?php echo $com->etat; ?>
											</td>
											<td>
												<?php echo $com->telephone; ?>
											</td>
											<td>
												<?php echo $com->mode_paiement; ?>
											</td>
										</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
				</form>

				<br/>
				<div class="navigation">
				<button type="submit" id="precedent" data-valeur="" >
						<</button> <span>---</span>
							<button type="submit" id="suivant" data-valeur="" >></button>
							<div class="clear"></div>
				</div>
			</div>

			<!-- body-->


			<!-- pied de page-->

			<div class="footer">
				<p> 2019 © SBS INFORMATIQUE. Presenter par <a href="#">SiX-Eagles</a>
				</p>
			</div>

			<!-- pied de page-->
		</div>
	</div>


	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>	
	<script src="js/custom.js"></script>
	<script src="js/mustache.js"></script>
</body>

</html>