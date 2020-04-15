<?php
include "../../../entities/avis.php";
include "../../../core/avis_core.php";
include "../../../config.php";

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['nom_produit']) and isset($_POST['note']) and isset($_POST['email']) )
{
	
$avis1=new avis($_POST['nom'],$_POST['prenom'],$_POST['nom_produit'],$_POST['note'],$_POST['email']);

$avis1_core=new Avis_core();
$avis1_core->ajouter_avis($avis1);
$avis1_core->afficher_avis($avis1);


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
			Merci de nous donner votre avis
			
		</div>
	</body>
</html>
';

mail($_POST['email'], " ", $message, $header);

header('Location: /sbs/views/frontend/tout_avis.php');

}
?>

