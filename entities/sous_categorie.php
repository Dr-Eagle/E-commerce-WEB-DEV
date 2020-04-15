<?PHP
class Sous_categorie{
	private $id_sous_categorie;
	private $nom_sous_categorie;
	private $lien_sous_categorie;
	private $ide_categorie;


	function __construct($nom_sous_categorie,$lien_sous_categorie,$ide_categorie){
		$this->nom_sous_categorie=$nom_sous_categorie;
		$this->lien_sous_categorie=$lien_sous_categorie;
		$this->ide_categorie=$ide_categorie;
	}
	
	function getid_sous_categorie(){
		return $this->id_sous_categorie;
	}
	function getnom_sous_categorie(){
		return $this->nom_sous_categorie;
	}
	function getlien_sous_categorie(){
		return $this->lien_sous_categorie;
	}
	function getide_categorie(){
		return $this->ide_categorie;
	}
	function setlien_sous_categorie($lien_sous_categorie){
		$this->lien_sous_categorie=$lien_sous_categorie;
	}
    function setnom_sous_categorie($nom_sous_categorie){
		$this->nom_sous_categorie=$nom_sous_categorie;
	}
}

?>