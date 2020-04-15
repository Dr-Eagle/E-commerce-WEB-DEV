<?PHP
include "../../../entities/reclamation.php";
include "../../../core/reclamation_core.php";
include "../../../config.php";

if (isset($_POST['recherche'])){



$reclamation1_core=new reclamation_core();
$reclamation=$reclamation1_core->affiche_reclamation();
$i=1000;
foreach($reclamation as $rec){
if($rec['nom_reclamation']==$_POST['recherche']){
$i=$rec['id_reclamation'];
}
}
header('Location: /sbs/views/backend/tout_reclamation.php?id_rec='.$i,'');


	
}else{
	echo "vérifier les champs";
}
?>