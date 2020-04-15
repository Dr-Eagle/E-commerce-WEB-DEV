<?PHP
class livreur{
	private $id_livreur;
	private $nom_livreur;
	private $prenom_livreur;
	private $image_livreur;
	private $email_livreur;
	private $telephone;


	function __construct($nom_livreur,$prenom_livreur,$image_livreur,$email_livreur,$telephone){
		$this->nom_livreur=$nom_livreur;
		$this->prenom_livreur=$prenom_livreur;
		$this->image_livreur=$image_livreur;
		$this->email_livreur=$email_livreur;
		$this->telephone=$telephone;
	}
	
	function getid_livreur(){
		return $this->id_livreur;
	}
	function getnom_livreur(){
		return $this->nom_livreur;
	}
	function getprenom_livreur(){
		return $this->prenom_livreur;
	}
	function getimage_livreur(){
		return $this->image_livreur;
	}
	function getemail_livreur(){
		return $this->email_livreur;
	}
	function gettelephone(){
		return $this->telephone;
	}
	function setid_livreur($id_livreur){
		$this->id_livreur=$id_livreur;
	}
    function setnom_livreur($nom_livreur){
		$this->nom_livreur=$nom_livreur;
	}
	function setprenom_livreur($prenom_livreur){
		$this->prenom_livreur=$prenom_livreur;
	}
	function setimage_livreur($image_livreur){
		$this->setimage_livreur=$image_livreur;
	}
	function setemail_livreur($email_livreur){
		$this->email_livreur=$email_livreur;
	}
	function settelephone($telephone){
		$this->telephone=$telephone;
	}
}

?>