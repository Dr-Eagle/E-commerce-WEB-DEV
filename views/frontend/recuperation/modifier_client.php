<?PHP
include "../../../entities/client.php";
include "../../../core/client_core.php";
include "../../../config.php";
if (isset($_GET['id_clt'])) {
	$client_core = new client_core();
	$result = $client_core->recuperer_client($_GET['id_clt']);
		
	$lien="http://localhost/sbs/views/images/";
	$image_profil=$lien.$_POST['image_profil'];
	$client1=new client($_POST['nom'],$_POST['prenom'],$_POST['mot_de_passe'],$_POST['date_naissance'],$_POST['email'],$_POST['sexe'],$image_profil);
	$client_core->modifier_client($client1,$_GET['id_clt']);
	header('Location: /sbs/views/frontend/espace_client.php');
}

else{ echo "verifies les champs ";
}

?> 


	
