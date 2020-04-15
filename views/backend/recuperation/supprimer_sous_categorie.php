<?PHP
include "../../../entities/sous_categorie.php";
include "../../../core/sous_categorie_core.php";
include "../../../config.php";

$sous_categorie1=new Sous_categorie_core();
$sous_categorie=$sous_categorie1->affiche_sous_categorie();

foreach($sous_categorie as $v)
{
	if($v['id_sous_categorie']==$_GET['id_cati'])
	{
	  $sous_categorie1->supprimer_sous_categorie($v['id_sous_categorie']);
	  header('Location: /sbs/views/backend/toutes_categories.php');
	}
}

   
   


?>