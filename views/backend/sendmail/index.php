<?php
include "../../../entities/livreur.php";
include "../../../core/livreur_core.php";
include "../../../config.php";

$livreur1 = new Livreur_core();
$livreur = $livreur1->affiche_livreur();

foreach($livreur as $liv){
if($liv['id_livreur']==$_GET['id_li']){

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
			Vous êtes conviés à effectuer la livraison de la <HR>facture N°'.$_GET['id_fa'];'
			
		</div>
	</body>
</html>
';

mail($liv['email_livreur'], "Salut ".$liv['nom_livreur'], $message, $header);

header('Location: /sbs/views/backend/tous_livraisons.php?id_lvr=0');
}
}
?>

