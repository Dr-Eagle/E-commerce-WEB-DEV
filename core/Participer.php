<?php
	include '../config.php';
	include 'Event_core.php';
	if(isset($_GET['iduser']) && isset($_GET['idevent']) && isset($_GET['participated'])) 
	{
		$iduser=$_GET['iduser'];
		$idevent=$_GET['idevent'];
		$participated=$_GET['participated'];
		if($participated==0)
		{
			Event_core::annulerParticipation($iduser,$idevent);
		}
		else
		Event_core::participer($iduser,$idevent);
	}
	else
	{
		echo'no values';
	}
	header('Location: http://localhost/SBS/views/frontend/affiche_events.php');
?>
