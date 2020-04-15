<?php
class Reclamation
{
private $id_reclamation;
private $nom;
private $prenom;
private $telephone;
private $email;
private $objet;
private $message;
//private $ide_facture;

public function __construct($nom,$prenom,$email,$telephone,$objet,$message)
{
 	$this->nom=$nom;
 	$this->prenom=$prenom;
 	$this->telephone=$telephone;
 	$this->email=$email;
 	$this->objet=$objet;
 	$this->message=$message;
 	//$this->ide_facture=$ide_facture;
}
public function getid_reclamation(){
	return $this->id_reclamation;
}
public function get_nom()
{
	return $this->nom;
}
public function get_prenom()
{
	return $this->prenom;
}
public function get_telephone()
{
	return $this->telephone;
}
public function get_email()
{
	return $this->email;
}
public function get_objet()
{
	return $this->objet;
}
public function get_message()
{
	return $this->message;
}

/*public function getide_facture()
{
	return $this->ide_facture;
}*/


public function set_nom($nom)
{
	$this->nom=$nom;
}
public function set_prenom($prenom)
{
	$this->prenom=$prenom;
}
public function set_telephone($telephone)
{
	$this->telephone=$telephone;
}
public function set_email($email)
{
	$this->email=$email;
}

public function set_objet($objet)
{
	$this->objet=$objet;
}
public function set_message($message)
{
	$this->message=$message;
}
/*public function setide_facture($ide_facture)
{
	$this->ide_facture=$ide_facture;
}*/


}

?>