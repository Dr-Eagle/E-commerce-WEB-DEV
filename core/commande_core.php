<?php
class Commande_core
{

    
    /**
     * ajout une commande
     *
     * @param  object $commande
     *
     * @return void
     */
    public function add_order($commande)
    {
        $id_commande=$commande->getid_commande();
        $ide_panier=$commande->getide_panier();
        $etat=$commande->getetat();
        $adresse_livraison=$commande->getadresse_livraison();
        $adresse_livraison_2=$commande->getadresse_livraison_2();
        $description_livraison=$commande->getdescription_livraison();
        $date_livraison=$commande->getdate_livraison();
        $mode_paiement=$commande->getmode_paiement();
        $ville=$commande->getville();
        $code_postal=$commande->getcode_postal();
        $telephone=$commande->gettelephone();
        $nom_client=$commande->getnom_client();
        $prenom_client=$commande->getprenom_client();
        $entreprise=$commande->getentreprise();
        $email=$commande->getemail();
        
        $this->query("INSERT into commande (ide_panier,etat,adresse_livraison,adresse_livraison_2,description_livraison,date_livraison,mode_paiement,ville,code_postal,telephone,nom_client,prenom_client,entreprise,email) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
        array($ide_panier,$etat,$adresse_livraison,$adresse_livraison_2,$description_livraison,$date_livraison,$mode_paiement,$ville,$code_postal,$telephone,$nom_client,$prenom_client,$entreprise,$email));
    }

    
    /**
     * decremente la quantité d'element d'un panier du stock total
     *
     * @param  int $id_panier
     *
     * @return void
     */
    public function decrement_stock($id_panier)
    {
        $ligne_panier_core=new Ligne_panier_core();
        $produits_panier=$ligne_panier_core->recuperer_Ligne_panier($id_panier);
        foreach ($produits_panier as $produit_panier) {
            $this->decrement_product($produit_panier->ide_produit,$produit_panier->quantite);
        }
    }
    
    /**
     * decrement pour un produit la quantite
     *
     * @param  int $id_produit
     * @param  int $quantite
     *
     * @return void
     */
    public function decrement_product($id_produit,$quantite)
    {
        $this->query("UPDATE produit set quantite=(quantite - ?) where id_produit=?",array($quantite,$id_produit));
    }
    
    /**
     * permet d'appliquer toutes les modifications dues à une commande
     *
     * @param  object $panier_core
     *
     * @return void
     */
    public function commander($panier_core)
    {
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['ville']) && isset($_POST['code_postal']) && isset($_POST['adresse_livraison']) && isset($_POST['telephone']) && isset($_POST['email']))
        {
            $autre_adresse = (isset($_POST['adresse_livraison_2'])) ? $_POST['adresse_livraison_2'] : "" ;
            $details_commande = (isset($_POST['details_commande'])) ? $_POST['details_commande'] : "" ;
            $entreprise = (isset($_POST['entreprise'])) ? $_POST['entreprise'] : "";
            $commande_core=new Commande_core();
            $commande=new Commande($_SESSION['panier'],"en attente",$_POST['adresse_livraison'], $autre_adresse,$details_commande,date('Y-m-d',strtotime('+2 days')),$_POST['email'],$_POST['mode_paiement'],$_POST['ville'],$_POST['code_postal'],intval($_POST['telephone']),$_POST['nom'],$_POST['prenom'],$entreprise);
            $commande_core->add_order($commande);
            $old_panier=$this->query("SELECT ide_code from panier where id_panier=?",array($_SESSION['panier']),"ret");
            $pan=new Panier($panier_core->total_panier($_SESSION['panier']),$old_panier[0]->ide_code,$_SESSION['client']);
            $code=new Code_promo_core();
            $code->increment_use_code($old_panier[0]->ide_code);
            $panier_core->update_cart($pan);
            $panier_core->nouveau_panier();
            $historique=new Historique("",$this->select_last_order()[0]->id_commande,$_SESSION['client']);
            $historique_core=new Historique_core();
            $historique_core->add_historic($historique);
            $commande_core->decrement_stock($_SESSION['panier']);
            $mail=new Sendmail();
            $mail->sendmail_en_attente($_POST['email'],'Commande en attente',$_POST['nom'].' '.$_POST['prenom'],$this->select_last_order()[0]);
            header('Location: /SBS/views/frontend/index.php');
        }
    }
    
    /**
     * selection une commande
     *
     * @param  int $id_commande
     *
     * @return array[object] $commande
     */
    public function select_order($id_commande)
    {
        return $this->query("SELECT * FROM commande where id_commande=?",array($id_commande),"ret");
    }

    
    /**
     * selectionl'id de la derniere commande ajoutée
     *
     * @return array[object] $commande
     */
    public function select_last_order()
    {
        return $this->query("SELECT MAX(id_commande) as id_commande from commande",array(),"ret");
    }

    
    /**
     * supprime une commande
     *
     * @param  int $id_commande
     *
     * @return void
     */
    public function delete_order($id_commande)
    {
        $this->query("DELETE from commande where id_commande=?",array($id_commande));
    }

    
    /**
     * modifie l'etat d'une commande
     *
     * @param  int $id_commande
     * @param  string $statut
     *
     * @return void
     */
    public function modify_order_status($id_commande,$statut)
    {
        $this->query("UPDATE commande set etat=? where id_commande=?",array($statut,$id_commande));
    }
    
    /**
     * retourne le nombre de commandes de chaque produit commandé
     *
     * @param int nombres d 'elements à afficher
     * 
     * @return array['nom_produit'=>array[string],'commande'=>array[int]] 
     */
    public function stat_order_product($nbre_elements)
    {
        $stat=array();
        $produits=$this->query("SELECT ide_produit,quantite from ligne_panier INNER JOIN panier on ligne_panier.ide_panier=panier.id_panier inner join commande on panier.id_panier=commande.ide_panier",array(),"ret");
        $produits_c=$this->query("SELECT ide_produit,quantite from selection_produit_compose",array(),"ret");
        
        foreach ($produits as $produit) {
            if(in_array($produit->ide_produit,array_keys($stat) ))
            {       
                $stat[$produit->ide_produit]+=intval($produit->quantite,10);
            }
            else
            {
                $stat[$produit->ide_produit]=intval($produit->quantite,10);
            }
        }
        foreach ($produits_c as $produit) {
            if(in_array($produit->ide_produit,array_keys($stat) ))
            {       
                $stat[$produit->ide_produit]+=intval($produit->quantite,10);
            }
            else
            {
                $stat[$produit->ide_produit]=intval($produit->quantite,10);
            }
        }

        $tab=array();
        
        $tab['nom_produit']=array();
        $tab['commande']=array();
        foreach ($stat as $key => $value) {
            $nom_produit=$this->query("SELECT nom_produit from produit where id_produit=?",array($key),"ret");
            array_push( $tab['nom_produit'],$nom_produit[0]->nom_produit);
            array_push( $tab['commande'] , $stat[$key]);
        }
        
        $meilleurs=array("nom_produit"=>array(),"commande"=>array());
        for ($j=0; $j < $nbre_elements; $j++) {
            
            if(count($tab['commande'])==0)
            {
                break;
            }
           
            $max=$tab['commande'][0];
            $index=0;
            for ($i=0; $i < count($tab['commande']); $i++) { 
                if($tab['commande'][$i] >= $max)
                {
                    $max=$tab['commande'][$i];
                    $index=$i;
                }
            }
            array_push($meilleurs['nom_produit'],$tab['nom_produit'][$index]);
            array_push($meilleurs['commande'],$max);
            unset($tab['commande'][$index]);
            unset($tab['nom_produit'][$index]);
            $tab['commande']=array_values($tab['commande']);
            $tab['nom_produit']=array_values($tab['nom_produit']);
            
        }

        return $meilleurs;
    }

    
    /**
     * retourne les commandes clasées par date et etat
     *
     * @return array['etat'=>array[object]] $commande
     */
    public function get_orders($page,$max_element)
    {
        $debut=($page - 1) * $max_element;
        $order=array();
        $etats=["en attente","validée","annulée"];
        foreach($etats as $etat)
        {
            $com=$this->query("SELECT * from commande INNER JOIN historique on commande.id_commande=historique.ide_commande where etat=? order by historique.date_commande ASC,commande.id_commande ASC ",array($etat),"ret");
            $order[$etat]=$com;
        }
        return $order;
    }

    public function update_pagignation($page,$max_element)
    {
        $debut=($page - 1) * $max_element;
        $total=0;
        $etats=["en attente","validée","annulée"];
        $i=0;
        foreach($etats as $etat)
        {
            $com=$this->query("SELECT * from commande INNER JOIN historique on commande.id_commande=historique.ide_commande where etat=? order by historique.date_commande ASC,commande.id_commande ASC",array($etat),"ret");
            $total += count($com);
            $i+=count($com);
            if($i>=$max_element)
            {
                break;
            }
        }
        
        $total_page= ceil($total / $max_element);
        $total_selectionne=ceil(count(get_orders($page,$max_element)) / $max_element);
       
        $precedent=$page + $total_selectionne;
        $suivant=$precedent + 1;

        return array("suivant"=>$suivant,"precdent"=>$precedent);
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

	function affiche_commande()
    {

        $sql = "SElECT * From commande ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

	
}
 ?>
