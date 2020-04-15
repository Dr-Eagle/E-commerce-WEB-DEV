<?PHP
class Sous_categorie_Core {
function afficher_sous_Categorie ($Sous_categorie){
        echo "id_sous_categorie: ".$Sous_categorie->getid_sous_categorie()."<br>";
        echo "nom_sous_categorie: ".$Sous_categorie->getnom_sous_categorie()."<br>";
        echo "lien_sous_categorie:".$Sous_categorie->getlien_sous_categorie()."<br>";
        echo "ide_categorie".$Sous_categorie->getide_sous_categorie()."<br>";
    }

    function affiche_sous_categorie(){ 

        $sql="SElECT * From sous_categorie";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function recuperer_id_categorie($nom_categorie)
    {
        $db = config::getConnexion();
        $query="select id_categorie from categorie where nom_categorie=?";
        $req=$db->prepare($query);
        $req->execute(array( $nom_categorie));
        while ($donnee=$req->fetch()) {
            echo $donnee['id_categorie'];
            return $donnee['id_categorie'];
        }
    }
    function ajouter_sous_Categorie($Sous_categorie){
        $sql="insert into sous_categorie (nom_sous_categorie,lien_sous_categorie,ide_categorie) 
        values (:nom_sous_categorie,:lien_sous_categorie,:ide_categorie)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        
       
        $nom_sous_categorie=$Sous_categorie->getnom_sous_categorie();
        $lien_sous_categorie=$Sous_categorie->getlien_sous_categorie();
        $nom_categorie=$Sous_categorie->getide_categorie();
        $ide_categorie=Sous_categorie_Core::recuperer_id_categorie( $nom_categorie); 
        $req->bindValue(':nom_sous_categorie',$nom_sous_categorie);
        $req->bindValue(':lien_sous_categorie',$lien_sous_categorie);
        $req->bindValue(':ide_categorie',$ide_categorie);

        
        
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    
    function supprimer_sous_categorie($id_sous_categorie){
        $sql="DELETE  from sous_categorie where id_sous_categorie= :id_sous_categorie";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_sous_categorie',$id_sous_categorie);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifier_sous_categorie($Sous_categorie,$id_sous_categorie){
        $sql="UPDATE sous_categorie SET nom_sous_categorie=:nom_sous_categorie ,lien_sous_categorie=:lien_sous_categorie ,ide_categorie=:ide_categorie WHERE id_sous_categorie=:id_sous_categorie";
        
        $db = config::getConnexion();
try{        
        $req=$db->prepare($sql);
        
         
        $nom_sous_categorie=$Sous_categorie->getnom_sous_categorie();
        $lien_sous_categorie=$Sous_categorie->getlien_sous_categorie();
        $ide_categorie=$Sous_categorie->getide_categorie();

        $req->bindValue(':nom_sous_categorie',$nom_sous_categorie);
        $req->bindValue(':lien_sous_categorie',$lien_sous_categorie);
        $req->bindValue(':ide_categorie',$ide_categorie);
        $req->bindValue(':id_sous_categorie',$id_sous_categorie);
        
        
            $req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
        
    }

    function recuperer_sous_categorie($id_sous_categorie){
        $sql="SELECT * from sous_categorie where id_sous_categorie=$id_sous_categorie";
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