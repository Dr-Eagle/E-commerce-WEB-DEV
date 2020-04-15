<?php
class Avis
{
private $id_avis;
private $nom;
private $prenom;
private $email;
private $nom_produit;
private $note;


public function __construct($nom,$prenom,$nom_produit,$note,$email)
{
 	$this->nom=$nom;
 	$this->prenom=$prenom;
 	$this->nom_produit=$nom_produit;
 	$this->note=$note;
 	$this->email=$email;
 	
 	
}
public function getid_avis(){
	return $this->id_avis;
}
public function get_nom()
{
	return $this->nom;
}
public function get_prenom()
{
	return $this->prenom;
}
public function get_nom_produit()
{
	return $this->nom_produit;
}
public function get_email()
{
	return $this->email;
}
public function get_note()
{
	return $this->note;
}



public function set_nom($nom)
{
	$this->nom=$nom;
}
public function set_prenom($prenom)
{
	$this->prenom=$prenom;
}
public function set_nom_produit($nom_produit)
{
	$this->nom_produit=$nom_produit;
}
public function set_email($email)
{
	$this->email=$email;
}

public function set_objet($note)
{
	$this->objet=$note;
}



}

?>