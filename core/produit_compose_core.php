<?PHP

class Produit_compose_core {
function afficher_produit_compose ($Produit_compose){
        echo "id_produit_compose: ".$Produit_compose->getid_produit_compose()."<br>";
        echo "nom_produit_compose: ".$Produit_compose->getnom_produit_compose()."<br>";
        echo "image_produit_compose: ".$Produit_compose->getimage_produit_compose()."<br>";
        echo "description_produit_compose " .$Produit_compose->getdescription_produit_compose()."<br>";
        echo "image_desciption " .$Produit_compose->getprix_produit_compose()."<br>";
    }
    
      function affiche_produit_compose(){ 

        $sql="SELECT * From produit_compose";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
   
    function ajouter_produit_compose($produit_compose){
        $sql="insert into produit_compose (nom_produit_compose,image_produit_compose,description_produit_compose,prix_produit_compose) 
        values (:nom_produit_compose,:image_produit_compose,:description_produit_compose,:prix_produit_compose)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        
        
        $nom_produit_compose=$produit_compose->getnom_produit_compose();
        //$component=$this->x_box_default_value($nom_produit_compose,"silver");
        $image_produit_compose=$produit_compose->getimage_produit_compose();
        $description_produit_compose=$produit_compose->getdescription_produit_compose();
        $prix_produit_compose=$produit_compose->getprix_produit_compose();
        
       
        
        $req->bindValue(':nom_produit_compose',$nom_produit_compose);
        $req->bindValue(':image_produit_compose',$image_produit_compose);
        $req->bindValue(':description_produit_compose',$description_produit_compose);
        $req->bindValue(':prix_produit_compose',$prix_produit_compose);
        
       
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    
    function supprimer_produit_compose($id_produit_compose){
        $sql="DELETE FROM produit_compose where id_produit_compose= :id_produit_compose";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_produit_compose',$id_produit_compose);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifier_produit_compose($produit_compose,$id_produit_compose){
        $sql="UPDATE produit_compose SET nom_produit_compose=:nom_produit_compose,image_produit_compose=:image_produit_compose,description_produit_compose=:description_produit_compose,prix_produit_compose=:prix_produit_compose WHERE id_produit_compose=:id_produit_compose";
        
        $db = config::getConnexion();
try{        
        $req=$db->prepare($sql);
        
        $nom_produit_compose=$produit_compose->getnom_produit_compose();
        $image_produit_compose=$produit_compose->getimage_produit_compose();
        $description_produit_compose=$produit_compose->getdescription_produit_compose();
        $prix_produit_compose=$produit_compose->getprix_produit_compose();


        $req->bindValue(':nom_produit_compose',$nom_produit_compose);
        $req->bindValue(':image_produit_compose',$image_produit_compose);
        $req->bindValue(':description_produit_compose',$description_produit_compose);
        $req->bindValue(':prix_produit_compose',$prix_produit_compose);
        $req->bindValue(':id_produit_compose',$id_produit_compose);

      
        
        
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
        
    }

    
    function recuperer_produit_compose($id_produit_compose){
        $sql="SELECT * from produit_compose where id_produit_compose=$id_produit_compose";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
    /**
     * recuperer les produits d'un produit composé groupés par sous categorie
     *
     * @param  string $max_box
     * @param  string $type_max_box
     * @param  int $limite_produit
     *
     * @return array['sous_categorie'=>array[object]] $produit
     */
    public function get_product($max_box,$type_max_box,$limite_produit)
    {
        $composite=array();
        $sous_categorie="('Processeurs','Cartes graphiques','Barrettes mémoires','Cartes mères')";
        $nom_sous_categories=$this->query("SELECT id_sous_categorie,nom_sous_categorie from sous_categorie where nom_sous_categorie in $sous_categorie ",array(),"ret");
        if($max_box!="")
        {
            foreach ($nom_sous_categories as $nom_sous_categorie) {
                $composite[$nom_sous_categorie->nom_sous_categorie]=$this->query("SELECT * from produit where max_box=? and ide_sous_categorie=? ",array($type_max_box,$nom_sous_categorie->id_sous_categorie),"ret");
            }
        }
        else
        {
            foreach ($nom_sous_categories as $nom_sous_categorie) {
                $composite[$nom_sous_categorie->nom_sous_categorie]=$this->query("SELECT * from produit where game_box=? and ide_sous_categorie=? ",array($type_max_box,$nom_sous_categorie->id_sous_categorie),"ret");
            }
        }
        return $composite;
    }


    /**
     * retourne les elements de base d'un composite product
     *
     * @param  string $composite_name
     * @param  string $type_max_box
     *
     * @return array['id_produit'=>array[int],'prix'=>float,'description'=>string]
     */
    public function x_box_default_value($composite_name,$type_max_box)
    {
        $components=$this->get_product($composite_name,$type_max_box,"");      
        $id=array();
        $prix=0;
        $description="";
        foreach ($components as $categorie => $produits) {
            if(!empty($produits))
            {
                $mini_prix=$produits[0]->prix;
                $mini_id=$produits[0]->id_produit;
                foreach ($produits as $produit) {
                    if($produit->prix < $mini_prix)
                    {
                        $mini_prix=$produit->prix;
                        $mini_id=$produit->id_produit;
                    }
                }
                array_push($id,intval($mini_id,10));
                $prix+=floatval($mini_prix);
                $description.=' <li>'.$produit->nom_produit.'</li><br>';
            }
        }
        $default=array("id_produit" => $id,"prix" => $prix,"description" => $description);
        return $default;
    }

    /**
     * met à jour les information de base d'un composite product
     *
     * @param  array[string] $liste_produit_compose
     *
     * @return void
     */
    public function update_produit_compose($liste_produit_compose=array("silver","gold","diamand"),
    $nom_pc_max=array("MAX BOX SILVER","MAX BOX GOLD","MAX BOX DIAMOND"),$nom_pc_game=array("GAME BOX SILVER","GAME BOX GOLD","GAME BOX DIAMOND"))
    {
        for ($i=0; $i < count($liste_produit_compose); $i++) { 
            $component=$this->x_box_default_value("max box",$liste_produit_compose[$i]);
            $this->query("UPDATE produit_compose set description_produit_compose=?,prix_produit_compose=? where nom_produit_compose=?",array($component['description'],$component['prix'],$nom_pc_max[$i]));
            $description="description_option".($i+1);
            $prix="prix_option".($i+1);
            $this->query("UPDATE composite_product set $description=?,$prix=? where id_composite_product=?",array($component['description'],$component['prix'],6));
        }
        
        for ($i=0; $i < count($liste_produit_compose); $i++) { 
            $component=$this->x_box_default_value("",$liste_produit_compose[$i]);
            $this->query("UPDATE produit_compose set description_produit_compose=?,prix_produit_compose=? where nom_produit_compose=?",array($component['description'],$component['prix'],$nom_pc_game[$i]));
            $description="description_option".($i+1);
            $prix="prix_option".($i+1);
            $this->query("UPDATE composite_product set $description=?,$prix=? where id_composite_product=?",array($component['description'],$component['prix'],7));
        }
        
    }
    public function affiche_single_produit_compose($nom_produit_compose)
    {
        return $this->query("SELECT * from produit_compose where nom_produit_compose=?",array($nom_produit_compose),"youssef");   
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