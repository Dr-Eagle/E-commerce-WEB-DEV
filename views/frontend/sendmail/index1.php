<?php
include "../../../entities/avis.php";
include "../../../core/avis_core.php";
include "../../../config.php";

if (isset($_GET['id_av']))
{
	echo "4";
	$avis_core = new Avis_core();
	$avis1=new Avis($_POST['nom'],$_POST['prenom'],$_POST['nom_produit'],$_POST['note'],$_POST['email']);
	$avis_core->modifier_avis($avis1,$_GET['id_av']);
	
}
else
{
	echo "verifier les champs";




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
			votre modification a bien été effectuée
			
		</div>
	</body>
</html>
';

mail($_POST['email'], " ", $message, $header);

header('Location: /sbs/views/frontend/tout_avis.php');

}
?>

