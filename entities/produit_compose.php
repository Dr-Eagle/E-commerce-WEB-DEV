<?PHP
class Produit_compose{
	private $id_produit_compose;
	private $nom_produit_compose;
	private $image_produit_compose;
	private $description_produit_compose;
	private $prix_produit_compose;


	function __construct($nom_produit_compose,$image_produit_compose,$description_produit_compose,$prix_produit_compose){
		$this->nom_produit_compose=$nom_produit_compose;
		$this->image_produit_compose=$image_produit_compose;
		$this->description_produit_compose=$description_produit_compose;
		$this->prix_produit_compose=$prix_produit_compose;
	}
	
	function getid_produit_compose(){
		return $this->id_produit_compose;
	}
	function getnom_produit_compose(){
		return $this->nom_produit_compose;
	}
	function getimage_produit_compose(){
		return $this->image_produit_compose;
	}
	function getdescription_produit_compose(){
		return $this->description_produit_compose;
	}
	function getprix_produit_compose(){
		return $this->prix_produit_compose;
	}
    function setnom_produit_compose($nom_produit_compose){
		$this->nom_produit_compose=$nom_produit_compose;
	}
	function setimage_produit_compose($image_produit_compose){
		$this->image_produit_compose=$image_produit_compose;
	}
	function setdescription_produit_compose($description_produit_compose){
		$this->description_produit_compose=$description_produit_compose;
	}
	function setprix_produit_compose($prix_produit_compose){
		$this->prix_produit_compose=$prix_produit_compose;
	}
}

?>