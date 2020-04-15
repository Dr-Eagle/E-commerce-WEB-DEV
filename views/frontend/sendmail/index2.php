<?php
include "../../../entities/reclamation.php";
include "../../../core/reclamation_core.php";
include "../../../config.php";

if (isset($_POST['nom']) and isset($_POST['prenom'])  and isset($_POST['email']) and isset($_POST['telephone']) and isset($_POST['objet']) and isset($_POST['message'])  )
  {
  	

	   $reclamation1 = new Reclamation($_POST['nom'], $_POST['prenom'], $_POST['email'],$_POST['telephone'], $_POST['objet'], $_POST['message']);
	   $reclamation1_core = new Reclamation_core();
	   $reclamation1_core->ajouter_reclamation($reclamation1);
	   $reclamation1_core->afficher_reclamation($reclamation1);

	 
	



$header="MIME-Version: 1.0\r\n";
$header.='From:"Admin SBS"<support@primfx.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
<html>
	<body>
		<div align="center">
			<img src=""/>
			<br />
			Nous avons bien recu votre reclamation
			
		</div>
	</body>
</html>
';

mail($_POST['email'], " ", $message, $header);

header('Location: /sbs/views/frontend/formulaire_reclamation.php');

}
?>

