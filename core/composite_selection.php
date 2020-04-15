<?php
class Composite_selection
{
    function ajouter($id_produit,$id_sous_categorie,$id_panier)
    {
       $selection=$this->query("SELECT * from composite_selection where ide_sous_categorie=? and ide_panier=?",
       array($id_sous_categorie,$id_panier),"ret");
       if(empty($selection))
       {
           $this->query("INSERT into composite_selection (ide_produit,ide_sous_categorie,ide_panier) value (?,?,?)",array($id_produit,$id_sous_categorie,$id_panier));
       }
       else
       {
            $this->query("UPDATE composite_selection set ide_produit=? where ide_sous_categorie=? and ide_panier=?",array($id_produit,$id_sous_categorie,$id_panier));
       }
    }

    public function get_sous_categorie($nom_categorie)
    {
        return $this->query("SELECT * from sous_categorie inner join categorie on 
        sous_categorie.ide_categorie=categorie.id_categorie where categorie.nom_categorie=?",array($nom_categorie),"ret");
    }
    
    public function get_produit__categorie($nom_categorie)
    {
        return $this->query("SELECT * from produit inner join sous_categorie on sous_categorie.id_sous_categorie=produit.ide_sous_categorie
        inner join categorie on categorie.id_categorie=sous_categorie.ide_categorie where categorie.nom_categorie=?",array($nom_categorie),"ret");
    }
    public function recuperer_produit_selectionne($id_panier)
    {
        return $this->query("SELECT nom_produit,prix,image_produit,produit.ide_sous_categorie,nom_sous_categorie from produit inner join 
        sous_categorie on produit.ide_sous_categorie=sous_categorie.id_sous_categorie inner join 
        composite_selection on composite_selection.ide_produit=produit.id_produit
         where ide_panier=?",array($id_panier),"ret");
    }
    public function recuperer_produit_selectionne_temp($ids_produits)
    {
        $ids="";
        $i=0;
        foreach ($ids_produits as $key => $id) {
            if($i==0)
            {
                $ids .= '('.$id;
            }
            else
            {
                $ids .= ','.$id;
            }  
            $i++;
            if($i==count($ids_produits))
            {
                $ids .=')';
            }
        }
        return $this->query("SELECT * from produit where id_produit in $ids ",array(),"ret");
    }

    public function supprimer($id_produit,$id_panier)
    {
        $this->query("DELETE from composite_selection where ide_sous_categorie=? and ide_panier=?",array($id_produit,$id_panier));
    }
    public function supprimer_product_builder($id_panier)
    {
        $this->query("DELETE from composite_selection where ide_panier=?",array($id_panier));
        if(isset($_SESSION['builder']))
        {
            $_SESSION['builder']=array();
        }
    }
    public function supprimer_old_product_builder($id_panier)
    {
        $this->query("DELETE from composite_selection where ide_panier=?",array($id_panier));
    }
    
    public function get_quantit($id_panier)
    {
        $q= $this->query("SELECT quantite from composite_selection where ide_panier=?",array($id_panier),"ret");
        if(empty($q))
        {
            return 0;
        }
        return $q[0]->quantite;
    }
    
    public function total($id_panier)
    {
        $t = ($this->query("SELECT SUM(prix) as total from produit inner join composite_selection on produit.id_produit=composite_selection.ide_produit 
        where ide_panier=?",array($id_panier),"ret"));
        if(empty($t))
        {
            return 0;
        }
        return $t[0]->total;
    }
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