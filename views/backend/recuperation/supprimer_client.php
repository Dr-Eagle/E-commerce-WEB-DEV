<?PHP
include "../../../entities/client.php";
include "../../../core/client_core.php";
include "../../../config.php";



$client_core1=new Client_core();
$client=$client_core1->affiche_client();

foreach($client as $val)
{
	if($val['id_client']==$_GET['id_cl'])
	{
	$client_core1->supprimer_client($val['id_client']);
	header('Location: /sbs/views/backend/tous_clients.php');
	}
}
    
   

?>