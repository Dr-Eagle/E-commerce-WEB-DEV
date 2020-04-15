<?php
	include_once "../../../config.php";
	include "../../../core/promo_core.php";
	$id=$_GET['id'];
	promo_core::delete_promotion($id);
	header("Location: http://localhost/SBS/views/backend/afficherpromotion.php");

?>