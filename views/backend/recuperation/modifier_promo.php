<?php
include "../../../entities/promotion.php";
include "../../../core/promo_core.php";
include "../../../config.php";

	/*echo ($_POST['id']) ; 
	echo ($_POST['nom']) ;
	echo ($_POST['type']) ;
	echo ($_POST['validite']) ;
	echo ($_POST['validite2']) ;
	echo ($_POST['description_detaillee']);
	echo ($_POST['image_event']); */
	var_dump($_POST['image_produit']);
	var_dump($_POST['image_produitcurrent']);
	if( empty($_POST['image_produit']) )
	{
		$image_produit=$_POST['image_produitcurrent'];
	}
	else
	{
		$lien="http://localhost/sbs/views/images/";
		$image_produit=$lien.$_POST['image_produit'];
	}
	if( empty($_POST['image_produit1']) )
	{
		$image_produit1=$_POST['image_produit1current'];
	}
	else
	{
		$lien="http://localhost/sbs/views/images/";
		$image_produit1=$lien.$_POST['image_produit1'];
	}
	if( empty($_POST['image_produit2']) )
	{
		$image_produit2=$_POST['image_produit2current'];
	}
	else
	{
		$lien="http://localhost/sbs/views/images/";
		$image_produit2=$lien.$_POST['image_produit2'];
	}
	//echo $image_event;
	$promotion= new promotion($_POST['idpro'],$_POST['reduction'],$_POST['datef'],$_POST['dated'],$image_produit,$image_produit1,$image_produit2);
	$evenement1_core = new promo_core();
	$promotion->setId_pro($_GET['id']);
	var_dump($promotion);
	$evenement1_core->update_promotion($promotion);
	//$evenement1_core->afficher_evenement($evenement1);

	header('Location: /sbs/views/backend/afficherpromotion.php');

?>