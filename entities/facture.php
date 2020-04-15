<?PHP
class Facture{
	private $id_facture;
	private $ide_commande;



	function __construct($ide_commande){
		$this->ide_commande=$ide_commande;
	}
	
	function getid_facture(){
		return $this->id_facture;
	}
	function getide_commande(){
		return $this->ide_commande;
	}
    function setide_commande($nom_categorie){
		$this->ide_commande=$ide_commande;
	}
}

?>