<?php
class Selection_produit_compose_core
{

    /**
     * ajout un produit compose
     *
     * @param  object $selection_produit_compose
     *
     * @return void
     */
    public function add_selection($selection)
    {   
        $nom_produit_compose=$selection->get_nom_produit_compose();
        $ide_produit=$selection->get_ide_produit();
        $ide_panier=$selection->get_ide_panier();
        $quantite=$selection->get_quantite();
            $this->query("INSERT into selection_produit_compose ( nom_produit_compose,ide_produit,ide_panier,quantite )values (?,?,?,?)",
        array($nom_produit_compose,$ide_produit,$ide_panier,$quantite));
         
    }

    
    /**
     * verifie si un produit compose et déja dans le panier
     *
     * @param  string $nom_produit_compose
     * @param  int $id_panier
     *
     * @return bool
     */
    public function existe($nom_produit_compose,$id_panier)
    {
        $ids=$this->query("SELECT id_selection from selection_produit_compose where nom_produit_compose=? and ide_panier=?",
        array($nom_produit_compose,$id_panier),"ret");
        if(empty($ids))
        {
            return false;
        }
        return true;
    }

    
    /**
     * supprime un produit compose du panier
     *
     * @param  int $id_panier
     * @param  string $nom_produit_compose
     *
     * @return void
     */
    public function delete_selection($id_panier,$nom_produit_compose)
    {
        $this->query("DELETE from selection_produit_compose where ide_panier=? and nom_produit_compose=?",array($id_panier,$nom_produit_compose));
    }

    
    /**
     * met à jour la quantite d'un produit compose
     *
     * @param  int $id_panier
     * @param  string $nom_produit_compose
     * @param  int $quantite
     *
     * @return void
     */
    public function update_quantity($id_panier,$nom_produit_compose,$quantite)
    {
        $this->query("UPDATE selection_produit_compose set quantite=? where ide_panier=? and nom_produit_compose=?",array($quantite,$id_panier,$nom_produit_compose));
    }

    
    /**
     * recupere tous les produits groupés par nom de produit composé
     *
     * @param  int $id_panier
     *
     * @return array['nom_produit_compose']=array[object] $produit
     */
    public function get_selected_product($id_panier)
    {
        $produits=array();
        $nom_produit_composes=$this->query("SELECT distinct(nom_produit_compose) from selection_produit_compose where ide_panier=?",array($id_panier),"ret");
        foreach ($nom_produit_composes as $nom_produit_compose) {
            $p=$this->query("SELECT * from produit inner join selection_produit_compose on produit.id_produit=selection_produit_compose.ide_produit where selection_produit_compose.ide_panier=? 
            and nom_produit_compose=?",array($id_panier,$nom_produit_compose->nom_produit_compose),"ret");
            $produits[$nom_produit_compose->nom_produit_compose]=$p;
        }
        return $produits;
    }
    
    /**
     * recupere le prix groupé par nom de produit composé
     *
     * @param  int $id_panier
     *
     * @return array['nom_produit_compose']=float $prix
     */
    public function get_prix_produit_compose($id_panier)
    {
        $tout_prix=array();
        $tout_quantite=$this->get_quantite($id_panier);
        $tout_produit_compose=$this->get_selected_product($id_panier);
        foreach ($tout_produit_compose as $nom_produit_compose => $produits) {
            $prix=0;
            foreach ($produits as $produit) {
                $prix += ($produit->prix * intval($tout_quantite[$nom_produit_compose],10));
            }
            $tout_prix[$nom_produit_compose]=$prix;
        }
        return $tout_prix;
    }

    
    /**
     * retourne le prix d'un produit compose dans le panier
     *
     * @param  int $id_panier
     * @param  string $nom
     *
     * @return float $prix
     */
    public function get_prix_unique($id_panier,$nom)
    {
        $tout_produit_compose=$this->get_selected_product($id_panier);  
        $prix=0;
        foreach ($tout_produit_compose[$nom] as $produit) {
            $prix += ($produit->prix);
        }
        return $prix;
    }
    
    /**
     * retourne la quantite groupé par nom de produit composé
     *
     * @param  int $id_panier
     *
     * @return array['nom_produit_compose'=>int] $quantite
     */
    public function get_quantite($id_panier)
    {
        $quantite=array();
        $nom_produit_composes=$this->query("SELECT distinct(nom_produit_compose) as nom_produit_compose from selection_produit_compose where ide_panier=?",array($id_panier),"ret");
        foreach ($nom_produit_composes as $nom_produit_compose) {
            $p= $this->query("SELECT quantite from selection_produit_compose where ide_panier=? and nom_produit_compose=? ",array($id_panier,$nom_produit_compose->nom_produit_compose),"ret");
            $quantite[$nom_produit_compose->nom_produit_compose]=$p[0]->quantite;
        }
        return $quantite;
        
    }


    /**
     * recupere les element d'un composite product
     *
     * @param  string $nom
     *
     * @return object $produit_compose
     */
    public function get_single_produit_compose($nom) 
    {
        return $this->query("SELECT * from produit_compose where nom_produit_compose=?",array($nom),"ret");
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
    function query($sql, $bind = array(), $retourner = "")
    {
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute($bind);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
        if ($retourner != "") {
                return  $req->fetchAll(PDO::FETCH_OBJ);
            }
    }
}
