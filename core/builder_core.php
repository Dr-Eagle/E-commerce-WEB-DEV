<?PHP
class builder_core{
    
      function affiche_builder(){ 

        $sql="SELECT * From builder";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function ajouter_builder($builder){
        $sql="insert into builder (ide_produit,ide_produit_compose,type) 
        values (:ide_produit,:ide_produit_compose,:type)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        
       
        $ide_produit=$builder->getide_produit();
        $ide_produit_compose=$builder->getide_produit_compose();
        $type=$builder->gettype();
        
  
        
        $req->bindValue(':ide_produit',$ide_produit);
        $req->bindValue(':ide_produit_compose',$ide_produit_compose);
        $req->bindValue(':type',$type);
        
       
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    
    function supprimer_builder($id_builder){
        $sql="DELETE FROM builder where id_builder= :id_builder";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_builder',$id_builder);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifier_builder($builder,$id_builder){
        $sql="UPDATE builder SET ide_produit=:ide_produit,ide_produit_compose=:ide_produit_compose,type=:type WHERE id_builder=:id_builder";
        
        $db = config::getConnexion();
try{        
        $req=$db->prepare($sql);
          
        $ide_produit=$builder->getide_produit();
        $ide_produit_compose=$builder->getide_produit_compose();
        $type=$builder->gettype();
        
  
        
        $req->bindValue(':ide_produit',$ide_produit);
        $req->bindValue(':ide_produit_compose',$ide_produit_compose);
        $req->bindValue(':type',$type);
 
        $req->bindValue(':id_builder',$id_builder);

      
        
        
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
        
    }
	
}
?>