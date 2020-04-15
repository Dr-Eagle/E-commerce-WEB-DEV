<?php
class Code_promo_core
{
    
    /**
     * ajout/met à jour si existe un code promo
     *
     * @param  object $Code
     *
     * @return void
     */
    public function add_code($Code)
    {
        $id_code=$Code->getid_code();
        $code=$Code->get_code();
        $pourcentage=$Code->get_pourcentage();
        $validite=$Code->get_validite();
        $usageC=$Code->get_usageC();
        $code_promo=$this->query("SELECT id_code from code_promo where id_code=?",array($id_code),"ret");
        if(empty($code_promo))
        {
            $this->query("INSERT INTO code_promo (code,pourcentage,validite,usagec) values (?,?,?,?)",
        array($code,$pourcentage,$validite,$usageC));
        }
        else
        {
            $this->update_code($Code);
        }
        
    }

    
    /**
     * return un code promo
     *
     * @param  object $code
     * @param  int $id_code
     *
     * @return array[object] $code_promo
     *
     */
    public function get_code_promo($code,$id_code=NULL)
    {
        if($id_code!=NULL)
        {
            return $this->query("SELECT * from code_promo where id_code=?",array($id_code),"ret");
        }
        return $this->query("SELECT * from code_promo where code=?",array($code),"ret");
    }

    
    /**
     * met à jour un code promo
     *
     * @param  object $Code
     *
     * @return void
     */
    public function update_code($Code)
    {
        $id_code=$Code->getid_code();
        $code=$Code->get_code();
        $pourcentage=$Code->get_pourcentage();
        $validite=$Code->get_validite();
        $usageC=$Code->get_usageC();
        $this->query("UPDATE code_promo set code=?,pourcentage=?,validite=?,usagec=? where id_code=?",array($code,$pourcentage,$validite,$usageC,$id_code));
    }
    
    /**
     * increment l'utilisation d un code promo
     *
     * @param  int $id_code
     *
     * @return void
     */
    public function increment_use_code($id_code)
    {
		
        $code=$this->get_code_promo("",$id_code);
        if(!empty($code))
        {
            $usage=intval($code[0]->usagec,10);
            $usage++;
            $this->query("UPDATE code_promo set usagec=? where id_code=?",array($usage,$id_code));
        }
       
    }
    
    /**
     * verifie si un code promo est valide
     *
     * @param  string $code
     *
     * @return bool
     */
    public function is_valide_code($code)
    {
        $db = config::getConnexion();
        $req=$db->prepare("SELECT DATEDIFF(validite,NOW()) as diff from code_promo where code=? ");
        $req->execute(array($code));
        $resultat=$req->fetch();
        if($resultat[0]>0)
        {
            return true;
        }
        return false;
    }
    
    /**
     * supprime un code promo
     *
     * @param  int $id_code
     *
     * @return void
     */
    public function delete_code($id_code)
    {
        $this->query("DELETE from code_promo where id_code=?",array($id_code));
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