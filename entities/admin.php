<?PHP
class Admin{
	private $id_admin;
	private $nom;
	private $prenom;
	private $email;
	private $mot_de_passe;
	private $image_profila;


	function __construct($nom,$prenom,$email,$mot_de_passe,$image_profila){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->mot_de_passe=$mot_de_passe;
		$this->image_profila=$image_profila;
		
	}
	
	function getid_admin(){
		return $this->id_admin;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getemail(){
		return $this->email;
	}
	function getmot_de_passe(){
		return $this->mot_de_passe;
	}
	function getimage_profila(){
		return $this->image_profila;
	}
    function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom=$prenom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setmot_de_passe($mot_de_passe){
		$this->mot_de_passe=$mot_de_passe;
	}
	function setimage_profila($image_profila){
		$this->image_profila=$image_profila;
	}
}

?>