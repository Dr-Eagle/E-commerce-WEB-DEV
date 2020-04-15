<?php


class Evenement
{
		private $id_ev;
		private $nom_ev;
		private $description;
		private $type;
		private $dated;
		private $datef;
		private $img;
	

               
       
       
      


		function __construct($id_ev,$nom_ev,$type,$img,$dated,$datef,$description)
	{	$this->id_ev=$id_ev;
		$this->nom_ev=$nom_ev;
		$this->description=$description;
        $this->type=$type;
		$this->dated=$dated;
		$this->datef=$datef;
        $this->img=$img;
	}





	function afficher()
	{
		echo $this->id_ev." ".$this->nom_ev." ".$this->description." ".$this->type." ".$this->dated."  ".$this->datef." ".$this->img;

	}



	function getId_ev(){return $this->id_ev;}
	function getNom_ev(){return $this->nom_ev;}
	function getType(){return $this->type;}
	function getDescription(){return $this->description;}
	function getDated(){return $this->dated;}
	function getDatef(){return $this->datef;}
	

	function getImg(){return $this->img;}
	

	public function setId_ev($id_ev) { $this->id_ev=$id_ev; } 


}


?>