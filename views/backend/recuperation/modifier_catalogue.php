<?PHP
include "../../../entities/catalogue.php";
include "../../../core/catalogue_core.php";
include "../../../config.php";

if (isset($_GET['id_prod'])){
	$catalogue_core=new Catalogue_core();
	$result=$catalogue_core->recuperer_catalogue($_GET['id_prod']);
	$a=$catalogue_core->affiche_catalogue();
	$lien="http://localhost/sbs/views/images/";
$image_principale=$lien.$_POST['image_principale'];
$image_2=$lien.$_POST['image_2'];
$image_3=$lien.$_POST['image_3'];
$image_description=$lien.$_POST['image_description'];
	
	foreach($a as $k)
	{	
		if($k['ide_produit']==$_GET['id_prod']){
			if (isset($_POST['image_principale']) and isset($_POST['image_2']) and isset($_POST['image_3']) and isset($_POST['image_description'])){

				$catalogue=new Catalogue($image_principale,$image_2,$image_3,$image_description,$_GET['id_prod']);
				$catalogue_core->afficher_catalogue($catalogue);
				$catalogue_core->modifier_catalogue($catalogue,$k['id_catalogue']);

			header('Location: /sbs/views/backend/tous_produits.php');
			}
	}
}
}
else{
	echo "nope brother";
}

?>