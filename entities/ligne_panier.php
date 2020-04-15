<?PHP
class Ligne_panier{
	private $id_ligne;
	private $quantite;
	private $prix_ligne;
	private $ide_produit;
	private $ide_panier;


	function __construct($quantite=1,$prix_ligne=0,$ide_produit,$ide_panier){
		$this->quantite=$quantite;
		$this->prix_ligne=$prix_ligne;
		$this->ide_produit=$ide_produit;
		$this->ide_panier=$ide_panier;
	}
	
	function getid_ligne(){
		return $this->id_ligne;
	}
	function getquantite(){
		return $this->quantite;
	}
	function getprix_ligne(){
		return $this->prix_ligne;
	}
	function getide_produit(){
		return $this->ide_produit;
	}
	function getide_panier(){
		return $this->ide_panier;
	}
    function setquantite($quantite){
		$this->quantite=$quantite;
	}
	function setprix_ligne($prix_ligne){
		$this->prix_ligne=$prix_ligne;
	}
}

?>