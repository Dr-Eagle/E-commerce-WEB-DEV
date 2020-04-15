<?php
include "../../../entities/ev.php";
include "../../../core/Event_core.php";
include "../../../config.php";

	/*echo ($_POST['id']) ; 
	echo ($_POST['nom']) ;
	echo ($_POST['type']) ;
	echo ($_POST['validite']) ;
	echo ($_POST['validite2']) ;
	echo ($_POST['description_detaillee']);
	echo ($_POST['image_event']); */
	if( empty($_POST['image_event']) )
	{
		$image_event=$_POST['current_img'];
	}
	else
	{
		$lien="http://localhost/sbs/views/images/";
		$image_event=$lien.$_POST['image_event'];
	}
	//echo $image_event;
	$evenement1 = new Evenement($_GET['id'],$_POST['nom'],$_POST['description_detaillee'], $_POST['type'], $_POST['validite'], $_POST['validite2'],$image_event);
	var_dump($evenement1);
	$evenement1_core = new Event_core();
	$evenement1_core->update_evenement($evenement1);
	//$evenement1_core->afficher_evenement($evenement1);

	header('Location: /SBS/views/backend/afficherevenement.php');

?>