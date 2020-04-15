<?PHP
class Livraison{
	private $id_livraison;
	private $ide_facture;
	private $ide_livreur;
	private $etat;

	function __construct($ide_facture,$ide_livreur,$etat){
		$this->ide_facture=$ide_facture;
		$this->ide_livreur=$ide_livreur;
		$this->etat=$etat;
        
	}
	
	function getid_livraison(){
		return $this->id_livraison;
	}
	function getide_facture(){
		return $this->ide_facture;
	}
	function getide_livreur(){
		return $this->ide_livreur;
	}

	function get_etat(){
		return $this->etat;
	}

	function setid_livraison($id_livraison){
		$this->id_livraison=$id_livraison;
	}
    function setide_facture($ide_facture){
		$this->ide_facture=$ide_facture;
	}
	function setide_livreur($ide_livreur){
		$this->ide_livreur=$ide_livreur;
	}

	function set_etat($etat){
		$this->etat=$etat;
	}
	
}

?>