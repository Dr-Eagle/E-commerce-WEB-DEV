<?php
include "../../../entities/ev.php";
include "../../../core/Event_core.php";
include "../../../config.php";

	var_dump ($_POST['image_event']); 
	if( empty($_POST['image_event']) )
	{
		$image_event=$_POST['current_img'];
	}
	else
	{
		$lien="http://localhost/sbs/views/images/";
		$image_event=$lien.$_POST['image_event'];
	}
	//var_dump $image_event;
	$evenement1 = new Evenement($_GET['id'],$_POST['nom_ev'], $_POST['type'],$image_event, $_POST['validite'], $_POST['validite1'],$_POST['description_detaillee']);
	//var_dump($evenement1);
	$evenement1_core = new Event_core();
	$evenement1_core->update_evenement($evenement1);
	//$evenement1_core->afficher_evenement($evenement1);

	header('Location: /SBS/views/backend/afficherevenement.php');

?>