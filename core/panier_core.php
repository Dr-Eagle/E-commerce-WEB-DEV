<?PHP
class Panier_core
{
    function __construct()
    {       
        $this->delete_old_cart();
        if (isset($_COOKIE['panier'])) {
            $_SESSION['panier'] = $_COOKIE['panier'];
        } else {
            $id_panier = $this->creer_panier();
            $this->creer_cookie($id_panier,86400);
            $_SESSION['panier'] = $id_panier;
        }
    }
    /**
     * ajout un produit au panier
     * 
     * @return bool fonction de la quntité en stock
     * @param int $id_produit
     */
    public function add_cart($id_produit)
    {
        $ligne_panier_core = new Ligne_panier_core();
        $produit = $this->query('SELECT * from produit where id_produit=?', array($id_produit),"ret");
        if (!empty($produit) && $produit[0]->quantite > 0) {
            $quantite = 1;
            $id_panier = $_SESSION['panier'];
            $ligne_panier = new Ligne_panier(intval($quantite, 10), intval(($quantite * $produit[0]->prix), 10), intval($id_produit, 10), intval($id_panier, 10));
            $ligne_panier_core->ajouter($ligne_panier);
            return true;
        } else {
            return false;
        }
    }
    /**
     * retourne tous les produits d'un panier classés par type
     * 
     * @return array['produit_simple'=>array['lignes'=>array[object],'produits'=>array[object]],'produit_compose'=>array['nom_produit_compose']=array[object],'product_builder'=>array[object]] $produit_simple, $produitx compose
     * @param $id_panier
     */
    public function get_element_card($id_panier)
    {
        $ligne_panier_core=new Ligne_panier_core();
        $produit_compose_core= new Selection_produit_compose_core();
        $composite_selection=new Composite_selection();

        $product_builder=$composite_selection->recuperer_produit_selectionne($id_panier);
        $produit_composes=$produit_compose_core->get_selected_product($id_panier);
        $elements=array("produits_simple"=>array('lignes'=>array(),'produits' => array()),"produits_compose" =>$produit_composes,"product_builder"=>$product_builder);
        
        $lignes=$ligne_panier_core->recuperer_Ligne_panier($id_panier,"","");
        foreach ($lignes as $ligne) {
            $produits=$this->query("SELECT * FROM produit WHERE id_produit=?"
            ,array($ligne->ide_produit),"ret");
            array_push($elements['produits_simple']['lignes'],$ligne);
            array_push($elements['produits_simple']['produits'],$produits[0]);
        }

        return $elements;
    }

    /**
     * supprime les panier dont la validité est depasséz
     * 
     * @return void
     */
    public function delete_old_cart()
    {
        $id_paniers=$this->query("SELECT id_panier from panier where validite < NOW() and ide_client is NULL",array(),"ret");
        
        foreach ($id_paniers as $id_panier) {
            $this->query("DELETE from selection_produit_compose where ide_panier=?",array($id_panier->id_panier));
            $this->query("DELETE from composite_selection where ide_panier=?",array($id_panier->id_panier));
            $this->query("DELETE from ligne_panier where ide_panier=?",array($id_panier->id_panier));
            $this->query("DELETE from panier where id_panier=?",array($id_panier->id_panier));
        }
    }

    /**
     * cree un nouveau panier et charge la variable de session panier
     * 
     * @return void
     */
    public function nouveau_panier()
    {
        setcookie("panier","",time() - 3600,"/");
        unset($_COOKIE['panier']);
        $id_panier=$this->creer_panier();
        $this->creer_cookie($id_panier,86400);
        $_SESSION['panier']=$id_panier;
    }

    /**
     * met à jour l id du code promo d'un panier
     * 
     * @param $id_panier,$id_code
     * @return void
     */
    public function set_ide_code($id_panier,$id_code)
    {
        $this->query("UPDATE panier set ide_code=? where id_panier=?",array($id_code,$id_panier));
    }

    /**
     * total du panier avec reduction
     *
     * @param  int $id_panier
     *
     * @return float $total
     */
    public function total_discount($id_panier)
    {
        $codes=$this->get_pourcentage($id_panier);
        if(empty($codes))
        {
            return $this->total_panier($id_panier);
        }
        foreach ($codes as $code) {
            return $this->total_panier($id_panier)*(1-($code->pourcentage/100));
        }
    }

    
    /**
     * pourcentage de reduction d'un panier
     *
     * @param  int $id_panier
     *
     * @return array[code_promo]
     */
    public function get_pourcentage($id_panier)
    {
        $panier=$this->get_panier($id_panier);
        return $this->query("SELECT pourcentage from code_promo where id_code=?",array($panier[0]->ide_code),"ret");
    }
    /**
     * retourne les attributs d'un panier
     *
     * @param  int $id_panier
     *
     * @return array[Panier]
     */
    public function get_panier($id_panier)
    {
        return $this->query("SELECT * from panier where id_panier=?",array($id_panier),"ret");
    }
    /**
     * verifie s'il ya un panier dans le cookie
     *
     * @return bool
     */
    function possede_panier()
    {
        if (isset($_COOKIE['panier'])) {
                return true;
            }
        return false;
    }
    /**
     * creer un cookie pour le panier
     *
     * @param  int $id_panier
     * @param  float $duree
     *
     * @return void
     */
    function creer_cookie($id_panier, $duree = (86400 * 30))
    {
        setcookie('panier', $id_panier, time() + $duree, "/");
    }
    
    /**
     * cree un oanier avec 2 jours de validité 
     *
     * @return int $id_panier
     */
    function creer_panier()
    {
        $db = config::getConnexion();
        $db->exec('INSERT into panier (validite) values (CURDATE() + INTERVAL 2 DAY)');
        return $db->lastInsertId();
    }

    
    /**
     * prix total d'un panier 
     *
     * @param  int $id_panier
     *
     * @return void
     */
    function total_panier($id_panier)
    {   
        $total=0;
        $selection=new Selection_produit_compose_core();
        $composite_selection=new Composite_selection();

        $lignes=$this->query("SELECT SUM(prix_ligne) as prix_total FROM ligne_panier WHERE ide_panier=?",array($id_panier),"ret");
        $tout_prix_produits_compose=$selection->get_prix_produit_compose($id_panier);
        $total_buider=$composite_selection->total($id_panier);
        
        foreach ($tout_prix_produits_compose as $nom_produit_compose => $prix) {
            if(!empty($prix))
            {
                $total += $prix;
            }
        }
        if(!empty($total_buider))
        {
            $total +=$total_buider;
        }
        if($lignes[0]->prix_total==NULL)
        {
            return $total;
        }
        return $lignes[0]->prix_total+$total;
    }
    
    /**
     * mettre à jour un panier
     *
     * @param  Panier $panier
     *
     * @return void
     */
    function update_cart($panier)
    {
        $prix_total=$panier->getprix_total();
        $ide_code=$panier->getide_code();
        $ide_client=$panier->getide_client();
        $this->query("UPDATE panier SET prix_total=?,ide_code=?,ide_client=? WHERE id_panier=?",array($prix_total,$ide_code,$ide_client,$_SESSION['panier']));
    }
    
    /**
     * compte le nombres de produits d'un panier
     *
     * @param  int $id_panier
     *
     * @return int
     */
    function count_items($id_panier)
    {
        $selection=new Selection_produit_compose_core();
        $composite_selection=new Composite_selection();
        $quantite_builder=$composite_selection->get_quantit($id_panier);
        $tout_quantite_pc=$selection->get_quantite($id_panier);
        $quantite=0;
        
        foreach ($tout_quantite_pc as $nom_produit_compose => $quantite_pc) {
            if(!empty($quantite_pc))
            {
                $quantite+=$quantite_pc;
            }
        }
        if(!empty($quantite_builder))
        {
            $quantite += $quantite_builder;
        }
        $quantites=$this->query("SELECT SUM(quantite) as quantite FROM ligne_panier where ide_panier=?",array($id_panier),"ret");
        if($quantites[0]->quantite==NULL)
        {
            $quantite;
        }
        return $quantites[0]->quantite + $quantite;
    }
    public function get_user($id_client)
    {
        return $this->query("SELECT * from client where id_client=?",array($id_client),"ret");
    }
    /**
     * requete preparée
     *
     * @param  string $sql
     * @param  array $bind valeurs à injecter
     * @param  string $retourner si retour
     *
     * @return object si retourner!=""
     */
    function query($sql, $bind = array(),$retourner="")
    {
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try
        {
            $req->execute($bind);
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        if($retourner!="")
        {
            return  $req->fetchAll(PDO::FETCH_OBJ);
        }
    }
    
	function affiche_panier(){ 

        $sql="SElECT * From panier";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
}
 
?>