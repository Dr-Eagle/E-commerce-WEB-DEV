<?php


class promotion
{
		private $id_pro;
        private $id_produit;
		private $reduc;
		private $dated;
		private $datef;
		
	

               
       
       
      


		function __construct($id_produit,$reduc,$datef,$dated)
	{	$this->id_produit=$id_produit;
		$this->reduc=$reduc;
		$this->datef=$datef;
        $this->dated=$dated;
	}

	function getId_produit(){return $this->id_produit;}
	function getReduc(){return $this->reduc;}
	function getDated(){return $this->dated;}
	function getDatef(){return $this->datef;}
	function getId_pro(){return $this->id_pro;}

	

	public function setId_pro($id_pro) { $this->id_pro=$id_pro; } 


}


?>