<?PHP
include "../../../entities/facture.php";
include "../../../core/facture_core.php";
include "../../../config.php";

if (isset($_POST['recherche'])){



$facture1 = new Facture_core();
$facture = $facture1->affiche_facture();

$i=1000;
foreach($facture as $fac){
if($fac['id_facture']==$_POST['recherche']){
$i=$fac['id_facture'];
}
}
header('Location: /sbs/views/backend/factures.php?id_fac='.$i,'');


	
}else{
	echo "vérifier les champs";
}
?>