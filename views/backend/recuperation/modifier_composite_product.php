<?PHP
include "../../../entities/composite_product.php";
include "../../../core/composite_product_core.php";
include "../../../core/produit_compose_core.php";
include "../../../config.php";

	$composite_product1_core = new Composite_product_core();
	$lien="http://localhost/sbs/views/images/";
	$image_option1=$lien.$_POST['image_option1'];
	$image_option2=$lien.$_POST['image_option2'];
	$image_option3=$lien.$_POST['image_option3'];

	if (isset($_POST['titre1']) and isset($_POST['titre2']) and isset($_POST['nom_option1']) and isset($_POST['nom_option2']) and isset($_POST['nom_option3']) and isset($_POST['image_option1']) and isset($_POST['image_option2']) and isset($_POST['image_option3']) and isset($_POST['description_option1']) and isset($_POST['description_option2']) and isset($_POST['description_option3']) and isset($_POST['prix_option1']) and isset($_POST['prix_option2']) and isset($_POST['prix_option3'])and isset($_POST['type1']))
	{
		$composite_product1 = new Composite_product($_POST['titre1'],$_POST['titre2'],$_POST['nom_option1'],$_POST['nom_option2'],$_POST['nom_option3'],$image_option1,$image_option2,$image_option3,$_POST['description_option1'],$_POST['description_option2'] ,$_POST['description_option3'],$_POST['prix_option1'],$_POST['prix_option2'],$_POST['prix_option3'],$_POST['type1']);
		$composite_product1_core = new Composite_product_core();
	$composite_product1_core->afficher_composite_product($composite_product1);
	$composite_product1_core->modifier_composite_product($composite_product1,$_GET['id_comp']);
	$pc=new Produit_compose_core();
	$pc->update_produit_compose();
	header('Location: /sbs/views/backend/tous_composite_product.php');
}
else{
	echo "nope";
}
?>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                