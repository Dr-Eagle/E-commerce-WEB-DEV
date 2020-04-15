<?PHP
class Client{
	private $id_client;
	private $nom;
	private $prenom;
	private $mot_de_passe;
	private $date_naissance;
	private $email;
  private $sexe;
  private $image_profil;
  //private $confirmkey;



	function __construct($nom,$prenom,$mot_de_passe,$date_naissance,$email,$sexe,$image_profil){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->mot_de_passe=$mot_de_passe;
		$this->date_naissance=$date_naissance;
		$this->email=$email;
    $this->sexe=$sexe;
    $this->image_profil=$image_profil;
    

        
	}
	
	function getid_client(){
		return $this->id_client;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getmot_de_passe(){
		return $this->mot_de_passe;
	}
	function getdate_de_naissance(){
		return $this->date_naissance;
	}
	function getemail(){
		return $this->email;
	}
    function getsexe(){
		return $this->sexe;
	}
    function getimage_profil(){
		return $this->image_profil;
	}
	/*function getconfirmkey(){
		return $this->confirmkey;
	}*/
	
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
	function setimage_profil($image_profil){
		$this->image_profil=$image_profil;
	}
	function setdate_d_naissance($date_naissance){
		$this->date_naissance=$date_naissance;
	}
}

?>