<?PHP

class Catalogue_core {
function afficher_catalogue ($Catalogue){
        echo "id_catalogue: ".$Catalogue->getid_catalogue()."<br>";
        echo "image_principale: ".$Catalogue->getimage_principale()."<br>";
        echo "image_2: ".$Catalogue->getimage_2()."<br>";
        echo "image_3 " .$Catalogue->getimage_3()."<br>";
        echo "image_desciption " .$Catalogue->getimage_description()."<br>";
        echo "ide_produit: ".$Catalogue->getide_produit()."<br>";
    }
    
      function affiche_catalogue(){ 

        $sql="SELECT * From catalogue";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
  /*  function recuperer_dernier_id_produit(){
        $db=config::getConnexion();
        $sql="SELECT max(id_produit) as id_produit from produit";
        $res=$db->query($sql);
        while ($donnee=$res->fetch()) {
            echo $donnee['id_produit'];
            return $donnee['id_produit'];
        }
    }*/
    function ajouter_catalogue($Catalogue){
        $sql="insert into catalogue (image_principale,image_2,image_3,image_description,ide_produit) 
        values (:image_principale,:image_2,:image_3,:image_description,:ide_produit)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        
       
        $image_principale=$Catalogue->getimage_principale();
        $image_2=$Catalogue->getimage_2();
        $image_3=$Catalogue->getimage_3();
        $image_description=$Catalogue->getimage_description();
        $ide_produit=$Catalogue->getide_produit();
        
  
        
        $req->bindValue(':image_principale',$image_principale);
        $req->bindValue(':image_2',$image_2);
        $req->bindValue(':image_3',$image_3);
        $req->bindValue(':image_description',$image_description);
        $req->bindValue(':ide_produit',$ide_produit);
        
       
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    
    function supprimer_catalogue($id_catalogue){
        $sql="DELETE FROM catalogue where id_catalogue= :id_catalogue";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_catalogue',$id_catalogue);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifier_catalogue($Catalogue,$id_catalogue){
        $sql="UPDATE catalogue SET image_principale=:image_principale,image_2=:image_2,image_3=:image_3,image_description=:image_description,ide_produit=:ide_produit WHERE id_catalogue=:id_catalogue";
        
        $db = config::getConnexion();
try{        
        $req=$db->prepare($sql);
        
        $image_principale=$Catalogue->getimage_principale();
        $image_2=$Catalogue->getimage_2();
        $image_3=$Catalogue->getimage_3();
        $image_description=$Catalogue->getimage_description();
        $ide_produit=$Catalogue->getide_produit();


        $req->bindValue(':image_principale',$image_principale);
        $req->bindValue(':image_2',$image_2);
        $req->bindValue(':image_3',$image_3);
        $req->bindValue(':image_description',$image_description);
        $req->bindValue(':ide_produit',$ide_produit);
        $req->bindValue(':id_catalogue',$id_catalogue);

      
        
        
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
        
    }

    function recuperer_catalogue($id_catalogue){
        $sql="SELECT * from catalogue where id_catalogue=$id_catalogue";
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