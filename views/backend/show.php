<?php
include "include.php";
include "entete.php";

if(isset($_GET['lien'])&& !empty($_GET['lien'])){

	$lien =$_GET['lien'];
	echo $lien;


		foreach($livreur as $row){
		
		if($row['nom_livreur']==$lien){
		echo "a";
			echo "<tr>
                                <td scope=\"row\" class=\"coche\"><input type=\"checkbox\" ></td>
                                <td>".$row['id_livreur']." </td>
                                <td>
                                    <img src=".$row['image_livreur']." alt=\"image\">
                                    <div class=\"option_produit\">
                                        <a href=\"modifier_livreur.php?id_li=".$row['id_livreur']." \">Modifier</a>
                                        <span>|</span>
                                        <a href=\"recuperation/supprimer_livreur.php?id_li=".$row['id_livreur']."\">Supprimer</a>
                                    </div>
                                </td>
                                <td>".$row['nom_livreur']." </td>
                                <td>".$row['prenom_livreur']."/td>
                                <td>".$row['email_livreur']."</td>
								<td>".$row['telephone']."</td>
                            </tr>";
		}}
	





}
?>