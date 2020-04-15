<?PHP
session_start();
include"../../../entities/produit.php";
include"../../../entities/catalogue.php";
include"../../../entities/sous_categorie.php";
include"../../../core/produit_core.php";
include"../../../core/catalogue_core.php";
include"../../../core/sous_categorie_core.php";
include"../tete.php";
//include"../entete.php";
require_once('../../../config.php');

$produit1 = new Produit_core();
$produit = $produit1->affiche_produit();

$sousCategorie1 = new Sous_categorie_Core();
$sous_categorie = $sousCategorie1->affiche_sous_categorie();

if(isset($_GET['user']))
{
    $user = (string) trim($_GET['user']);
    $db = config::getConnexion();
    $req1 = $db->query("SELECT * from produit where nom_produit LIKE '$user%' LIMIT 10");
    $req1 = $req1->fetchALL();

    

?>

<table>
        <thead class="thead-inverse">
                            <tr>
                                <th class="coche"><input type="checkbox" name="tout_cocher" id="tout_cocher"></th>
                                <th class="image_produit"><i class="fas fa-file-image"></i></th>
                                <th class="nom">Nom</th>
                                <th class="quantite">Quantite</th>
                                <th class="prix">Prix</th>
                                <th class="categorie_p">Sous-Categorie</th>
                                
                            </tr>
        </thead>
<tbody>
<?php

foreach($req1 as $pr){
    
    $catalogues=$produit1->get_catalogue($pr["id_produit"]);

    
?>
<tr>
                                <td scope="row" class="coche"><input type="checkbox"></td>
                                <td><img src="<?= $pr['image_produit']; ?>" alt="image"></td>
                                <td><?= $pr['nom_produit']; ?>
                                    <div class="option_produit">
                                        <a href="modifier_produit.php?id_prod=<?= $pr['id_produit']; ?>">Modifier Produit</a>
                                        <span>|</span>
                                        <a href="/sbs/views/backend/recuperation/supprimer_produit.php?id_po=<?= $pr['id_produit']; ?>">Supprimer produit</a>
                                         
                                         <?php
                                            if(!empty($catalogues))
                                            {  
                                        ?>
                                        <?= "<span>|</span>"?>
                                        <?='<a href="/sbs/views/backend/recuperation/supprimer_catalogue.php?id_por='?><?= $pr['id_produit']; ?><?='">Supprimer catalogue</a>';?>
                                        <?php   
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="option_produit">
                                        <?php
                                            if(empty($catalogues))
                                            {
                                                ?>
                                                <?= '<a href="ajouter_catalogue.php?id_produit='?><?= $pr['id_produit']; ?><?='">Ajouter catalogue</a>';?>
                                             <?php   
                                            }
                                        ?>
                                        
                                    </div>
                                </td>
                                <td><?= $pr['quantite']; ?></td>
                                <td><?= $pr['prix']; ?></td>
								<?php
								foreach($sous_categorie as $var){
								if($var['id_sous_categorie']==$pr['ide_sous_categorie']){
								?>
                                <td><?= $var['nom_sous_categorie']; ?></td>
								<?php
								}
								}
								$sousCategorie1=new Sous_categorie_Core();
								$sous_categorie=$sousCategorie1->affiche_sous_categorie();
								?>
                            </tr>
                         <?php
						 }
						 ?>
                        </tbody>
                    </table>
<?php
}
?>
        