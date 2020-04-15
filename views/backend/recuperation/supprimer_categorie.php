<?PHP
include "../../../entities/categorie.php";
include "../../../core/categorie_core.php";
include "../../../config.php";



$categorie_core1=new categorie_core();
$categorie=$categorie_core1->affiche_categorie();

foreach($categorie as $va)
{
	if($va['id_categorie']==$_GET['id_cat'])
	{
	$categorie_core1->supprimer_categorie($va['id_categorie']);
	header('Location: /sbs/views/backend/toutes_categories.php');	
	}
}
    
   

?>