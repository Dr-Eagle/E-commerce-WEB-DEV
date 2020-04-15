<?PHP
class Historique{
	private $id_historique;
	private $date_commande;
	private $ide_commande;
	private $ide_client;

	function __construct($date_commande,$ide_commande,$ide_client){
		$this->date_commande=$date_commande;
		$this->ide_commande=$ide_commande;
    $this->ide_client=$ide_client;
	}
	
	function getid_historique(){
		return $this->id_historique;
	}
	function getdate_commande(){
		return $this->date_commande;
	}
	function getide_commande(){
		return $this->ide_commande;
	}
	function getide_client(){
		return $this->ide_client;
	}

    function setdate_commande($date_commande){
		$this->date_commande=$date_commande;
	}
	function setide_commande($ide_commande){
		$this->ide_commande=$ide_commande;
	}
}

?>