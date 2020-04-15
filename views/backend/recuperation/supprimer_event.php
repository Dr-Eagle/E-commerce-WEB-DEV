<?php
	include_once "../../../config.php";
	include "../../../core/Event_core.php";
	$id_ev=$_GET['id'];
	Event_core::delete_evenement($id_ev);
	header("Location: http://localhost/sbs/views/backend/afficherevenement.php");

?>