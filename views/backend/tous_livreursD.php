<?php
session_start();
if(isset($_SESSION['admin'])){
include "include.php";
$_GET['id_lr']=0;
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
                <h2>Tous les livreurs</h2>
				<table>
				<td>
                <div class="option_ajout">
                    <label for="">option :</label><a href="formulaire_livreur.php">Ajouter un Livreur</a> </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
				</td>
				<td>
				<div class="option_ajout">
                    <label for=""></label><a href="tous_livreursC.php?id_cr=0">Tri croissant</a> </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
				</td>
				<td>
				<div class="option_ajout">
                    <label for=""></label><a href="tous_livreursD.php?id_dr=0">Tri decroissant</a> </label>
                </div>
				</td>
				</table>
				<table>
				<td>
				<div class="form-group" style="length:50px">
                    <input class="form-control" type="text" id="recherche-livreur" placeholder="Rechercher un Livreur" >
					<div style="margin-top: 20px">
						<a><div id="resulta-recherche"></div></a>
					</div>
					
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
                    <table class="table table-striped table-inverse affichage_produit" id="result-recherche">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="nom_utilisateur">ID</th>
                                <th class="image_produit"><i class="fas fa-file-image"></i> Image</th>
                                <th class="nom_utilisateur">Nom</th>
                                <th class="nom_utilisateur">prenom</th>
                                <th class="Adresse_Messagerie">Adresse de Messagerie</th>
								<th class="Adresse_Messagerie">Telephone</th>
                            </tr>
                        </thead>
                        <tbody >
						
						<?php
							if($_GET['id_dr']==0){
							$livreur5 = new Livreur_core();
							$livreur4 = $livreur5->affiche_livreur_decroissant();
						foreach($livreur4 as $li){

							?>
							<tr>
                                <td scope="row" class="coche"><input type="checkbox" name="" id=""></td>
                                <td><?php echo $li['id_livreur']; ?></td>
                                <td>
                                    <img src="<?php echo $li['image_livreur']; ?>" alt="image">
                                    <div class="option_produit">
                                        <a href="modifier_livreur.php?id_li=<?php echo $li['id_livreur']; ?>">Modifier</a>
                                        <span>|</span>
                                        <a href="recuperation/supprimer_livreur.php?id_li=<?PHP echo $li['id_livreur'];?>">Supprimer</a>
                                    </div>
                                </td>
                                <td><?php echo $li['nom_livreur']; ?> </td>
                                <td><?php echo $li['prenom_livreur']; ?></td>
                                <td><?php echo $li['email_livreur']; ?></td>
								<td><?php echo $li['telephone']; ?></td>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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
	$('#recherche-livreur').keyup(function(){
	$('#result-recherche').html('');
		var utilisateur= $(this).val();
		if(utilisateur != ""){
			$.ajax({
				type: 'GET',
				url: 'recuperation/rechercher_livreur.php',
				data: 'user=' + encodeURIComponent(utilisateur),
				success: function(data){
					if(data != ""){
						$('#result-recherche').append(data);
						/*$('#result-recherche').click(function(){
							var lien = $(this).text();
							$.get('show.php',{lien:lien},function(data){
							$('#feedback').html(data);
							});
						});*/
					}else{
						document.getElementById('result-recherche').innerHTML =" <div style='font-size: 20px; text-align:center; margin-top: 10px'>Ce livreur n'existe pas !!</div> "
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

<?php
}
else{
	header("location:formulaire_connexion.php");
}