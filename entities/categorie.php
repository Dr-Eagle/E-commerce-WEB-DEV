<?PHP
class Categorie{
	private $id_categorie;
	private $nom_categorie;
	private $lien_categorie;


	function __construct($nom_categorie,$lien_categorie){
		$this->nom_categorie=$nom_categorie;
		$this->lien_categorie=$lien_categorie;
	}
	
	function getid_categorie(){
		return $this->id_categorie;
	}
	function getnom_categorie(){
		return $this->nom_categorie;
	}
	function getlien_categorie(){
		return $this->lien_categorie;
	}
    function setnom_categorie($nom_categorie){
		$this->nom_categorie=$nom_categorie;
	}
	function setlien_categorie($lien_categorie){
		$this->lien_categorie=$lien_categorie;
	}
}

?>