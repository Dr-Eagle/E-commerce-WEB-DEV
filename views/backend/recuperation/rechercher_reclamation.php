<?PHP
session_start();
include "../../../entities/Reclamation.php";
include "../../../core/reclamation_core.php";
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

$req = $db->query("select * from Reclamation where nom LIKE '$user%' LIMIT 10");

$req = $req->fetchALL();

    ?>
<table>
<thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="nom_utilisateur">Id Reclamation</th>
                                <th class="nom_utilisateur">Nom</th>
                                <th class="nom_utilisateur">Prenom</th>
                                <th class="nom_utilisateur">Telephone</th>
                                <th class="Adresse_Messagerie">Adresse de Messagerie</th>
                                <th class="nom_utilisateur">Objet</th>
                                <th class="nom_utilisateur">Message</th>
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
                                <?= $t['id_reclamation']; ?>
                                <div class="option_produit">      
                                        <a href="recuperation/supprimer_reclamation.php?id_reclamation=<?= $t['id_reclamation'];?>">Supprimer</a>
                                    </div>
                                </td>
                                <td>
                                   <?= $t['nom']; ?>
                                </td>
                                <td>
                                    <?= $t['prenom']; ?>
                                </td>
                                <td><?= $t['telephone']; ?></td>
                                <td><?= $t['email']; ?></td>
                                <td><?= $t['objet']; ?></td>
                                <td><?= $t['message']; ?></td>



                  
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