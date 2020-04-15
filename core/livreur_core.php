<?PHP
class Livreur_core {
function afficher_livreur ($Livreur){
        echo "id_livreur: ".$Livreur->getid_livreur()."<br>";
        echo "nom_livreur: ".$Livreur->getnom_livreur()."<br>";
        echo "prenom_livreur: ".$Livreur->getprenom_livreur()."<br>";
        echo "image_livreur: ".$Livreur->getimage_livreur()."<br>";
        echo "email_livreur " .$Livreur->getemail_livreur()."<br>";
        echo "telephone: ".$Livreur->gettelephone()."<br>";
    }

    function affiche_livreur()
    {

        $sql = "SElECT * From livreur ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

	function affiche_livreur_croissant()
    {

        $sql = "SElECT * From livreur ORDER BY nom_livreur ASC ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

	function affiche_livreur_decroissant()
    {

        $sql = "SElECT * From livreur ORDER BY nom_livreur DESC ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

	
    
    function ajouter_livreur($Livreur){
        $sql="insert into livreur (nom_livreur,prenom_livreur,image_livreur,email_livreur,telephone) 
        values (:nom_livreur,:prenom_livreur,:image_livreur,:email_livreur,:telephone)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        
       
        $nom_livreur=$Livreur->getnom_livreur();
        $prenom_livreur=$Livreur->getprenom_livreur();
        $image_livreur=$Livreur->getimage_livreur();
        $email_livreur=$Livreur->getemail_livreur();
        $telephone=$Livreur->gettelephone();
  
        
        $req->bindValue(':nom_livreur',$nom_livreur);
        $req->bindValue(':prenom_livreur',$prenom_livreur);
        $req->bindValue(':image_livreur',$image_livreur);
        $req->bindValue(':email_livreur',$email_livreur);
        $req->bindValue(':telephone',$telephone);
       
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    
    function supprimer_livreur($id_livreur){
        $sql="DELETE from livreur where id_livreur= :id_livreur";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_livreur',$id_livreur);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifier_livreur($Livreur,$id_livreur){
        $sql="UPDATE livreur SET nom_livreur=:nom_livreur,prenom_livreur=:prenom_livreur,image_livreur=:image_livreur,email_livreur=:email_livreur,telephone=:telephone WHERE id_livreur=:id_livreur";
        
        $db = config::getConnexion();
try{        
        $req=$db->prepare($sql);
        
        $nom_livreur=$Livreur->getnom_livreur();
        $prenom_livreur=$Livreur->getprenom_livreur();
        $image_livreur=$Livreur->getimage_livreur();
        $email_livreur=$Livreur->getemail_livreur();
        $telephone=$Livreur->gettelephone();



        $req->bindValue(':nom_livreur',$nom_livreur);
        $req->bindValue(':prenom_livreur',$prenom_livreur);
        $req->bindValue(':image_livreur',$image_livreur);
        $req->bindValue(':email_livreur',$email_livreur);
        $req->bindValue(':telephone',$telephone);
        $req->bindValue('id_livreur',$id_livreur);

      
        
        
            $req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
        
    }

    function recuperer_livreur($id_livreur)
{
    $sql = "SELECT * from livreur where id_livreur=$id_livreur";
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