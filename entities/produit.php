<?PHP
class Produit{
	private $id_produit;
	private $prix;
	private $quantite;
	private $nom_produit;
	private $image_produit;
	private $max_box;
    private $game_box;
    private $description_courte;
    private $description_detaillee;
    private $ide_sous_categorie;

	function __construct($prix,$quantite,$nom_produit,$image_produit,$max_box,$game_box,$description_courte,$description_detaillee,$ide_sous_categorie){
		$this->prix=$prix;
		$this->quantite=$quantite;
		$this->nom_produit=$nom_produit;
		$this->image_produit=$image_produit;
		$this->max_box=$max_box;
        $this->game_box=$game_box;
        $this->description_courte=$description_courte;
        $this->description_detaillee=$description_detaillee;
        $this->ide_sous_categorie=$ide_sous_categorie;
        
	}
	
	function getid_produit(){
		return $this->id_produit;
	}
	function getprix(){
		return $this->prix;
	}
	function getquantite(){
		return $this->quantite;
	}
	function getnom_produit(){
		return $this->nom_produit;
	}
	function getimage_produit(){
		return $this->image_produit;
	}
	function getmax_box(){
		return $this->max_box;
	}
    function getgame_box(){
		return $this->game_box;
	}
    function getdescription_courte(){
		return $this->description_courte;
	}
	function getdescription_detaillee(){
		return $this->description_detaillee;
	}
	function getide_sous_categorie(){
		return $this->ide_sous_categorie;
	}

    function setprix($prix){
		$this->prix=$prix;
	}
	function setquantite($quantite){
		$this->quantite=$quantite;
	}
	function setnom_produit($nom_produit){
		$this->nom_produit=$nom_produit;
	}
	function setimage_produit($image_produit){
		$this->image_produit=$image_produit;
	}
	function setmax_box($max_box){
		$this->max_box=$max_box;
	}
    
    function setgame_box($game_box){
		$this->game_box=$game_box;
	}
    function setdescription_courte($description_courte){
		$this->description_courte=$description_courte;
	}
	function setdescription_detaillee($description_detaillee)
	{	$this->description_detaillee=$description_detaillee;}
	
}

?>