<?php
include "../../../entities/client.php";
include "../../../core/client_core.php";
include "../../../config.php";

$client1_core=new Client_core();
$client=$client1_core->affiche_client();

if(isset($_POST['email']))
{
	foreach ($client as $clt) {
	
		if($clt['email']==$_POST['email'])
		{
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
												Voici votre mot de passe:'.$clt['mot_de_passe'];'
			
										</div>
									</body>
							</html>
						';

mail($clt['email'], "Récupération du mot de passe ", $message, $header);

			header('Location: ../../frontend/formulaire_connexion.php');	
		}
	}
	
header('Location: ../../frontend/formulaire_connexion.php');	
}


?>

