<?PHP
class Commande{
	private $id_commande;
	private $ide_panier;
	private $etat;
	private $adresse_livraison;
	private $adresse_livraison_2;
	private $description_livraison;
    private $date_livraison;
    private $mode_paiement;
    private $ville;
    private $code_postal;
		private $telephone;
		private $email;
    private $nom_client;
		private $prenom_client;
		private $entreprise;

	function __construct($ide_panier,$etat,$adresse_livraison,$adresse_livraison_2,$description_livraison,$date_livraison=NULL,$email,$mode_paiement,$ville,$code_postal,$telephone,$nom_client,$prenom_client,$entreprise){
		$this->ide_panier=$ide_panier;
		$this->etat=$etat;
		$this->adresse_livraison=$adresse_livraison;
		$this->adresse_livraison_2=$adresse_livraison_2;
		$this->description_livraison=$description_livraison;
		$this->date_livraison=$date_livraison;
		$this->mode_paiement=$mode_paiement;
		$this->ville=$ville;
		$this->code_postal=$code_postal;
		$this->telephone=$telephone;
		$this->nom_client=$nom_client;
		$this->prenom_client=$prenom_client;
		$this->email=$email;
		$this->entreprise=$entreprise;
	}
	
	function getid_commande(){
		return $this->id_commande;
	}
	function getide_panier(){
		return $this->ide_panier;
	}
	function getetat(){
		return $this->etat;
	}
	function getadresse_livraison(){
		return $this->adresse_livraison;
	}
	function getadresse_livraison_2(){
		return $this->adresse_livraison_2;
	}
	function getdescription_livraison(){
		return $this->description_livraison;
	}
    function getdate_livraison(){
		return $this->date_livraison;
	}
    function getmode_paiement(){
		return $this->mode_paiement;
	}
	function getville(){
		return $this->ville;
	}
	function getcode_postal(){
		return $this->code_postal;
	}
	function gettelephone(){
		return $this->telephone;
	}
	public function getnom_client()
	{
			 return $this->nom_client;
	}
	public function getprenom_client()
	{
			 return $this->prenom_client;
	}
	public function getemail()
	{
			 return $this->email;
	}
	public function getentreprise()
	{
			 return $this->entreprise;
	}

    function setide_panier($ide_panier){
		$this->ide_panier=$ide_panier;
	}
	function setetat($etat){
		$this->etat=$etat;
	}
	function setadresse_livraison($adresse_livraison){
		$this->adresse_livraison=$adresse_livraison;
	}
	function setadresse_livraison_2($adresse_livraison_2){
		$this->adresse_livraison_2=$adresse_livraison_2;
	}
	function setdescription_livraison($description_livraison){
		$this->description_livraison=$description_livraison;
	}
    
    function setdate_livraison($date_livraison){
		$this->date_livraison=$date_livraison;
	}
    function setmode_paiement($mode_paiement){
		$this->mode_paiement=$mode_paiement;
	}
	function setville($ville){
		$this->ville=$ville;
	}
	function setcode_postal($code_postal){
		$this->code_postale=$code_postal;
	}
	function settelephone($telephone){
		$this->telephone=$telephone;
	}
	
}

?>