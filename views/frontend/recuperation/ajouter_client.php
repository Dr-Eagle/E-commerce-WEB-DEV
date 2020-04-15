<?PHP
include "../../../entities/client.php";
include "../../../core/client_core.php";
include "../../../config.php";

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mot_de_passe']) and isset($_POST['date_naissance']) and isset($_POST['email']) and isset($_POST['sexe']) and isset($_POST['image_profil']))
{
	$lien="http://localhost/sbs/views/images/";
	$image_profil=$lien.$_POST['image_profil'];
$client1=new Client($_POST['nom'],$_POST['prenom'],$_POST['mot_de_passe'],$_POST['date_naissance'],$_POST['email'],$_POST['sexe'],$image_profil);

$client1_core=new Client_core();
$longeurkey=12;
$key ="";
for($i=1;$i<$longeurkey;$i++)
{
	$key .=mt_rand(0,9);
}

$client1_core->ajouter_client($client1);
if(isset($_POST['email']))
{
	foreach ($client as $clt) {
	
		
				$header="MIME-Version: 1.0\r\n";
				$header.='From:"Admin SBS"<support@primfx.com>'."\n";
				$header.='Content-Type:text/html; charset="uft-8"'."\n";
				$header.='Content-Transfer-Encoding: 8bit';

				$message='
							<html>
									<body>
										<div align="center">
											<a href="http://localhost/SBS/views/frontend/confirmation.php?nom='.urldecode($nom).'$key'.$key.'"> confirmer votre compte <a>
			
										</div>
									</body>
							</html>
						';

mail($clt['email'], "con ", $message, $header);
        
    }
}
$client1_core->afficher_client($client1);
header('Location: /sbs/views/frontend/espace_client.php');
echo "ok";	
}
else
{
	echo "vérifier les champs";
}
//*/

?>