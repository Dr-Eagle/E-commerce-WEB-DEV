<?php
class Ligne_panier_core
{
    
    /**
     * ajout /met à jour une ligne de panier 
     *
     * @param  Ligne_panier $Ligne_panier
     *
     * @return void
     */
    function ajouter($Ligne_panier)
    {
        $ide_produit=$Ligne_panier->getide_produit();
        $quantite=$Ligne_panier->getquantite();
        $prix_ligne=$Ligne_panier->getprix_ligne();
        $ide_panier=$Ligne_panier->getide_panier();
        $ligne=$this->recuperer_Ligne_panier($ide_panier,"",$ide_produit);
        
        if(empty($ligne))
        {
            $this->query("INSERT INTO ligne_panier (ide_produit,quantite,prix_ligne,ide_panier)  Values (?,?,?,?)",array($ide_produit,$quantite,$prix_ligne,$ide_panier));
        }
        else
        {
            $quantite=(intval($ligne[0]->quantite,10));
            $quantite++;
            $produit=$this->query("SELECT prix from produit where id_produit=?",array($ligne[0]->ide_produit),"ret");
            $prix_ligne=intval($quantite*$produit[0]->prix);
            $this->query('UPDATE ligne_panier SET quantite=?,prix_ligne=? where ide_produit=? and ide_panier=? and id_ligne=?',array($quantite,$prix_ligne,$ide_produit,$ide_panier,$ligne[0]->id_ligne));
        }
    }
    /**
     * met à jour la quntite d'une ligne de panier
     *
     * @param  int $id_ligne
     * @param  int $quantite
     *
     * @return void
     */
    public function update_items_number($id_ligne,$quantite)
    {
        $this->query("UPDATE ligne_panier set quantite=? where id_ligne=?",array($quantite,$id_ligne));
    }
    
    /**
     * recalcul le prix d'une ligne de panier
     *
     * @param  int $id_ligne
     *
     * @return float $prix
     */
    public function update_price_line_cart($id_ligne)
    {
        $ligne=$this->recuperer_Ligne_panier("",$id_ligne,"");
        $produit=$this->query("SELECT prix from produit where id_produit=?",array($ligne[0]->ide_produit),"ret");
        $this->query("UPDATE ligne_panier set prix_ligne=?",array($produit[0]->prix*$ligne[0]->quantite));
        return $produit[0]->prix*$ligne[0]->quantite;
    }
    
    /**
     * supprime une ligne de panier
     *
     * @param  int $id_ligne
     *
     * @return void
     */
    function delete_line($id_ligne)
    {
        $this->query("DELETE FROM ligne_panier WHERE id_ligne=?",array($id_ligne));
    }

    
    /**
     * recuperer une ou plusieurs ligne de panier
     *
     * @param  int $ide_panier
     * @param  int $id_ligne
     * @param  int $ide_produit
     *
     * @return array[object] $ligne_panier
     */
    function recuperer_Ligne_panier($ide_panier="",$id_ligne="",$ide_produit="")
    {
        if($id_ligne!="")
        {
            return $this->query('SELECT * from ligne_panier where id_ligne=?',array($id_ligne),"ret");
        }
        if($ide_panier!="" && $ide_produit=="")
        {
            return $this->query('SELECT * FROM  ligne_panier where ide_panier=?',array($ide_panier),"ret");
        }
        if($ide_produit!="" && $ide_panier=="")
        {
            return $this->query('SELECT * FROM  ligne_panier where ide_produit=?',array($ide_produit),"ret");
        }
        if($ide_produit!="" && $ide_panier!="")
        {
            return $this->query('SELECT * FROM  ligne_panier where ide_produit=? and ide_panier=?',array($ide_produit,$ide_panier),"ret");
        }
        
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
}
?>