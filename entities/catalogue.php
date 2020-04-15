<?PHP
class Catalogue{
	private $id_catalogue;
	private $image_principale;
	private $image_2;
	private $image_3;
	private $image_description;
	private $ide_produit;


	function __construct($image_principale,$image_2,$image_3,$image_description,$ide_produit){
		$this->image_principale=$image_principale;
		$this->image_2=$image_2;
		$this->image_3=$image_3;
		$this->image_description=$image_description;
		$this->ide_produit=$ide_produit;
	}
	
	function getid_catalogue(){
		return $this->id_catalogue;
	}
	function getimage_principale(){
		return $this->image_principale;
	}
	function getimage_2(){
		return $this->image_2;
	}
	function getimage_3(){
		return $this->image_3;
	}
	function getimage_description(){
		return $this->image_description;
	}
	function getide_produit(){
		return $this->ide_produit;
	}
    function setimage_principale($image_principale){
		$this->image_principale=$image_principale;
	}
	function setimage_2($image_2){
		$this->image_2=$image_2;
	}
	function setimage_3($image_3){
		$this->image_3=$image_3;
	}
	function setimage_description($image_description){
		$this->image_description=$image_description;
	}
}

?>