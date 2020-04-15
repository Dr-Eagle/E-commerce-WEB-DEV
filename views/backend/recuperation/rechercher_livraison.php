<?PHP
include "../../../entities/livraison.php";
include "../../../core/livraison_core.php";
include "../../../config.php";

if (isset($_POST['recherche'])){



$livraison1 = new  Livraison_core();
$livraison = $livraison1->affiche_livraison();

$i=1000;
foreach($livraison as $li){
if($li['id_livraison']==$_POST['recherche']){
$i=$li['id_livraison'];
}
}
header('Location: /sbs/views/backend/tous_livraisons.php?id_lvr='.$i,'');


	
}else{
	echo "vérifier les champs";
}
?>