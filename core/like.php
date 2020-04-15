<?php
	include '../config.php';
	include 'Event_core.php';
	if(isset($_GET['iduser']) && isset($_GET['idevent']) && isset($_GET['liked'])) 
	{
		$iduser=$_GET['iduser'];
		$idevent=$_GET['idevent'];
		$liked=$_GET['liked'];
		if($liked==0)
		{
			Event_core::Dislike($iduser,$idevent);
		}
		else
		Event_core::Like($iduser,$idevent);
	}
	else
	{
		echo'no values';
	}
	header('Location: http://localhost/SBS/views/frontend/affiche_events.php');
?>