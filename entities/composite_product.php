<?PHP
class Composite_product{
	private $id_composite_product;
	private $titre1;
	private $titre2;
	private $nom_option1;
	private $nom_option2;
	private $nom_option3;
    private $image_option1;
    private $image_option2;
    private $image_option3;
    private $description_option1;
	private $description_option2;
	private $description_option3;
	private $prix_option1;
	private $prix_option2;
	private $prix_option3;
	private $type1;


	function __construct($titre1,$titre2,$nom_option1,$nom_option2,$nom_option3,$image_option1,$image_option2,$image_option3,$description_option1,$description_option2,$description_option3,$prix_option1,$prix_option2,$prix_option3,$type1){
		$this->titre1=$titre1;
		$this->titre2=$titre2;
		$this->nom_option1=$nom_option1;
		$this->nom_option2=$nom_option2;
		$this->nom_option3=$nom_option3;
        $this->image_option1=$image_option1;
        $this->image_option2=$image_option2;
        $this->image_option3=$image_option3;
        $this->description_option1=$description_option1;
        $this->description_option2=$description_option2;
        $this->description_option3=$description_option3;
        $this->prix_option1=$prix_option1;
        $this->prix_option2=$prix_option2;
				$this->prix_option3=$prix_option3;
				$this->type1=$type1;

        
	}
	
	function getid_composite_product(){
		return $this->id_composite_product;
	}
	function gettitre1(){
		return $this->titre1;
	}
	function gettitre2(){
		return $this->titre2;
	}
	function getnom_option1(){
		return $this->nom_option1;
	}
	function getnom_option2(){
		return $this->nom_option2;
	}
	function getnom_option3(){
		return $this->nom_option3;
	}
    function getimage_option1(){
		return $this->image_option1;
	}
    function getimage_option2(){
		return $this->image_option2;
	}
	function getimage_option3(){
		return $this->image_option3;
	}
	function getdescription_option1(){
		return $this->description_option1;
	}
	function getdescription_option2(){
		return $this->description_option2;
	}
	function getdescription_option3(){
		return $this->description_option3;
	}
	function getprix_option1(){
		return $this->prix_option1;
	}
	function getprix_option2(){
		return $this->prix_option2;
	}
	function getprix_option3(){
		return $this->prix_option3;
	}
	function gettype1(){
		return $this->type1;
	}

    function settitre1($titre1){
		$this->titre1=$titre1;
	}
	function settitre2($titre2){
		$this->titre2=$titre2;
	}
	function setnom_option1($nom_option1){
		$this->nom_option1=$nom_option1;
	}
	function setnom_option2($nom_option2){
		$this->nom_option2=$nom_option2;
	}
	function setnom_option3($nom_option3){
		$this->nom_option3=$nom_option3;
	}
    
    function setimage_option1($image_option1){
		$this->image_option1=$image_option1;
	}
    function setimage_option2($image_option2){
		$this->image_option2=$image_option2;
	}
	function setimage_option3($image_option3)
	{	$this->image_option3=$image_option3;}
	
}

?>