<?PHP
include "../../../entities/produit.php";
include "../../../core/produit_compose_core.php";
include "../../../core/produit_core.php";
include "../../../config.php";

if (isset($_GET['id_prod'])){
	$produit_core=new Produit_core();
    $result=$produit_core->recuperer_produit($_GET['id_produit']);
	foreach($result as $row){
		
		$prix=$row['prix'];
		$quantite=$row['quantite'];
		$nom_produit=$row['nom_produit'];
		$image_produit=$row['image_produit'];
        $max_box=$row['max_box'];
		$game_box=$row['game_box'];
		$description_courte=$row['description_courte'];
        $description_detaillee=$row['description_detaillee'];
        $ide_sous_categorie=$row['ide_sous_categorie'];
	}
	$pc=new Produit_compose_core();
	$pc->update_produit_compose();
}
if (isset($_POST['modifier'])){
	$produit= new Produit($_POST['prix'], $_POST['quantite'], $_POST['nom_produit'], $_POST['image_produit'], $_POST['max_box'], $_POST['game_box'], $_POST['description_courte'], $_POST['description_detaillee'], $_POST['nom_sous_categorie']);
	$produit_core->modifier_produit($Produit,$_POST['id_produit']);
	echo $_POST['id_produit'];
	
	$pc=new Produit_compose_core();
	$pc->update_produit_compose();
	header('location : ../tous_produits.php');
}
?>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                