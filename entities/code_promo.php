<?PHP
class Code_promo{
	private $id_code;
	private $code;
	private $pourcentage;
	private $validite;
	private $usageC;


	function __construct($id_code=NULL,$code,$pourcentage,$validite,$usageC=0){
		$this->id_code=$id_code;
		$this->code=$code;
		$this->pourcentage=$pourcentage;
		$this->validite=$validite;
		$this->usageC=$usageC;
	}
	
	function getid_code(){
		return $this->id_code;
	}
	function get_code(){
		return $this->code;
	}
	function get_pourcentage(){
		return $this->pourcentage;
	}
	function get_validite(){
		return $this->validite;
	}
	function set_validite($validite){
		$this->validite=$validite;
	}
    function set_pourcentage($pourcentage){
		$this->pourcentage=$pourcentage;
	}
	function get_usageC(){
		return $this->usageC;
	}
}

?>