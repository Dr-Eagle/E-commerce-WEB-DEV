<?PHP
	session_start();
include "../../../entities/livreur.php";
include "../../../core/livreur_core.php";
include "../tete.php";
require_once('../../../config.php');

if (isset($_GET['user'])){

$user = (String) trim($_GET['user']);
$db = config::getConnexion();

$req = $db->query("select * from livreur where nom_livreur LIKE '$user%' LIMIT 10");

$req = $req->fetchALL();
?>
<table>
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
<tbody>
<?php
foreach($req as $r){
	?>

					
	<tr>
                                <td scope="row" class="coche"><input type="checkbox" ></td>
                                <td><?= $r['id_livreur']?> </td>
                                <td>
                                    <img src="<?= $r['image_livreur'] ?>" alt="image">
                                    <div class="option_produit">
                                        <a href="modifier_livreur.php?id_li=<?= $r['id_livreur'] ?> ">Modifier</a>
                                        <span>|</span>
                                        <a href="recuperation/supprimer_livreur.php?id_li=<?= $r['id_livreur'] ?>">Supprimer</a>
                                    </div>
                                </td>
                                <td><?= $r['nom_livreur'] ?></td>
                                <td><?= $r['prenom_livreur'] ?></td>
                                <td><?= $r['email_livreur'] ?></td>
								<td><?= $r['telephone'] ?></td>
                            </tr>
							<?php
							}
							?>
	</tbody>
	</table>
	<?php
	
}
?>