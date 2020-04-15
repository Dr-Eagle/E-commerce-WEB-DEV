<?PHP

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

		}
	}
}

?>