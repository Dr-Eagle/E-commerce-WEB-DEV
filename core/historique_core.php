<?php
class Historique_core
{

    
    /**
     * ajout une commmande en historique
     *
     * @param  object $historique
     *
     * @return void
     */
    public function add_historic($historique)
    {
        $ide_commande=$historique->getide_commande();
        $ide_client=$historique->getide_client();
        $this->query("INSERT INTO historique (ide_commande,ide_client,date_commande) values (?,?,?)",array($ide_commande,$ide_client,date("Y-m-d")));
    }

    
    /**
     * supprime un historique
     *
     * @param  int $id_historique
     *
     * @return void
     */
    public function delete_historic($id_historique)
    {
        $this->query("DELETE from historique where id_historique=?",array($id_historique));
    }
    
    /**
     * supprime l'historique dun utilisateur
     *
     * @param  int $ide_client
     *
     * @return void
     */
    public function delete_historique_user($ide_client)
    {
        $this->query("DELETE from historique where ide_client=?",array($ide_client));
    }
    
    /**
     * supprime toutes les historiques de commmande
     *
     * @return void
     */
    public function delete_all()
    {
        $this->query("DELETE  from historique");
    }
    
    /**
     * recuperer l historique de commande de l'utlisateur en cours
     *
     * @return array/array[object] 
     */
    public function select_id_order_user()
    {
        if(isset($_SESSION['client']))
        {
            return $this->query("SELECT ide_commande as id_commande,date_commande from historique where ide_client=?",array($_SESSION['client']),"ret");
        }
        return array();
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