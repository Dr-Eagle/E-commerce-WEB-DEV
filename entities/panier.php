<?PHP
class Panier{
	private $id_panier;
	private $prix_total;
	private $ide_code;
	private $ide_client;


	function __construct($prix_total=NULL,$ide_code=NULL,$ide_client=NULL){
		$this->prix_total=$prix_total;
		$this->ide_code=$ide_code;
		$this->ide_client=$ide_client;
	}
	
	function getid_panier(){
		return $this->id_panier;
	}
	function getprix_total(){
		return $this->prix_total;
	}
	function getide_code(){
		return $this->ide_code;
	}
	function getide_client(){
		return $this->ide_client;
	}
    function setprix_total($prix_total){
		$this->prix_total=$prix_total;
	}
	function setide_code($ide_code){
		$this->ide_code=$ide_code;
	}
	function setide_client($ide_client){
		$this->ide_client=$ide_client;
	}
}

?>