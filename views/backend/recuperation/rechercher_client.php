<?PHP
session_start();
include "../../../entities/client.php";
include "../../../core/client_core.php";
include "../tete.php";
require_once('../../../config.php');

/*if (isset($_GET['critere'])){
	$critere=$_GET['critere']+'%';
	$db = config::getConnexion();
    $req = $db->prepare("SELECT *FROM client where nom LIKE ?");
    $req->exec(array($critere));
    $table=$req->fetchall(PDO::FETCH_OBJ);*/

    if (isset($_GET['user'])){

$user = (String) trim($_GET['user']);
$db = config::getConnexion();

$req = $db->query("select * from client where nom LIKE '$user%' LIMIT 10");

$req = $req->fetchALL();

    ?>
<table>
<thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="nom_utilisateur">Id Client</th>
                                <th class="image_produit"><i class="fas fa-file-image"></i>Image</th>
                                <th class="nom_utilisateur">Nom</th>
                                <th class="nom_utilisateur">Prenom</th>
								<th class="nom_utilisateur">Date_naissance</th>
                                <th class="Adresse_Messagerie">Adresse de Messagerie</th>
								<th class="nom_utilisateur">Sexe</th>
                            </tr>
                        </thead>
<tbody>
<?php
/*if(count($table)e>0)
{
	echo"<h3>"+count($table)+"resultat trouve </h3>"
    if($_GET['id_lr']==0){*/

foreach($req as $t){

	?>

					
						<tr>
								<td scope="row" class="coche"><input type="checkbox" ></td>
                                <td>
                                <?= $t['id_client']; ?>
                                <div class="option_produit">      
                                        <a href="recuperation/supprimer_client.php?id_cl=<?= $t['id_client'];?>">Supprimer</a>
                                    </div>
                                </td>
                                <td>
                                    <img src="<?= $t['image_profil']; ?>" alt="image">
                                    
                                </td>
                                <td>
                                   <?= $t['nom']; ?>
                                </td>
                                <td>
                                    <?= $t['prenom']; ?>
                                </td>
								<td><?= $t['date_naissance']; ?></td>
                                <td><?= $t['email']; ?></td>
								<td><?= $t['sexe']; ?></td>



                  
                        </tr>
							<?php
							} 
                              //}}else echo"<p class='rouge'> aucun </p>";
							?>
	</tbody>
	</table>
	<?php

}
?>