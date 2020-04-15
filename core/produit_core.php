<?PHP

class Produit_core {
function afficher_produit ($Produit){
		
		echo "prix: ".$Produit->getprix()."<br>";
		echo "quantite: ".$Produit->getquantite()."<br>";
		echo "nom_produit: ".$Produit->getnom_produit()."<br>";
        echo "image_produit: ".$Produit->getimage_produit()."<br>";
		echo "description_courte: ".$Produit->getdescription_courte()."<br>";
        echo "description_detaillee: ".$Produit->getdescription_detaillee()."<br>";
        echo "ide_sous_categorie: ".$Produit->getide_sous_categorie()."<br>";
	}
    function recuperer_dernier_id()
    {
        $db = config::getConnexion();
        return $db->lastInsertId();
    }
    public function get_catalogue($id_produit)
    {
        $db = config::getConnexion();
        $req=$db->prepare("SELECT * from catalogue where ide_produit=?");
        $req->execute(array($id_produit));
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    function affiche_produit(){ 

        $sql="SElECT * From produit";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function recuperer_id_sous_categorie($nom_sous_categorie)
    {
        $db = config::getConnexion();
        $query="select id_sous_categorie from sous_categorie where nom_sous_categorie=?";
        $req=$db->prepare($query);
        $req->execute(array( $nom_sous_categorie));
        while ($donnee=$req->fetch()) {
            echo $donnee['id_sous_categorie'];
            return $donnee['id_sous_categorie'];
        }
    }
	function ajouter_produit($Produit){
		$sql="insert into produit (prix,quantite,nom_produit,image_produit,max_box,game_box,description_courte,description_detaillee,ide_sous_categorie) 
		values (:prix,:quantite,:nom_produit,:image_produit,:max_box,:game_box,:description_courte,:description_detaillee,:ide_sous_categorie)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
       
        $prix=$Produit->getprix();
        $quantite=$Produit->getquantite();
        $nom_produit=$Produit->getnom_produit();
        $image_produit=$Produit->getimage_produit();
        $max_box=$Produit->getmax_box();
        $game_box=$Produit->getgame_box();
        $description_courte=$Produit->getdescription_courte();
        $description_detaillee=$Produit->getdescription_detaillee();
        $nom_sous_categorie=$Produit->getide_sous_categorie();
        $ide_sous_categorie= Produit_core::recuperer_id_sous_categorie($nom_sous_categorie);
  
		
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom_produit',$nom_produit);
        $req->bindValue(':image_produit',$image_produit);
		$req->bindValue(':max_box',$max_box);
        $req->bindValue(':game_box',$game_box);
        $req->bindValue(':description_courte',$description_courte);
        $req->bindValue(':description_detaillee',$description_detaillee);
        $req->bindValue(':ide_sous_categorie',$ide_sous_categorie);
        
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function supprimer_produit($id_produit){
		$sql="DELETE FROM produit where id_produit= :id_produit";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_produit',$id_produit);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifier_produit($Produit,$id_produit){
		$sql="UPDATE produit SET prix=:prix,quantite=:quantite,nom_produit=:nom_produit,image_produit=:image_produit,max_box=:max_box,game_box=:game_box,description_courte=:description_courte,description_detaillee=:description_detaillee,ide_sous_categorie=:ide_sous_categorie WHERE id_produit=:id_produit";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
		
        $prix=$Produit->getprix();
        $quantite=$Produit->getquantite();
        $nom_produit=$Produit->getnom_produit();
        $image_produit=$Produit->getimage_produit();
        $max_box=$Produit->getmax_box();
        $game_box=$Produit->getgame_box();
        $description_courte=$Produit->getdescription_courte();
        $description_detaillee=$Produit->getdescription_detaillee();
        $ide_sous_categorie=$Produit->getide_sous_categorie();

		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom_produit',$nom_produit);
        $req->bindValue(':image_produit',$image_produit);
		$req->bindValue(':max_box',$max_box);
        $req->bindValue(':game_box',$game_box);
        $req->bindValue(':description_courte',$description_courte);
        $req->bindValue(':description_detaillee',$description_detaillee);
        $req->bindValue(':ide_sous_categorie',$ide_sous_categorie);
        $req->bindValue(':id_produit',$id_produit);
      
		
		
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
    public function recherche($valeur)
    {
        $sql="SELECT * from produit where nom_produit like '%$valeur%'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste->fetchAll(PDO::FETCH_OBJ);
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recuperer_produit($id_produit){
        $sql="SELECT * from produit where id_produit=$id_produit";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public static function tri_produit()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produit ORDER by nom_produit ASC";
        $liste = $db->query($sql);
        return $liste;
    }
    public static function tri_prix_produit()
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM produit ORDER by prix DESC";
        $liste = $db->query($sql);
        return $liste;
    }
    function afficher_nouveautes(){
        $sql="SELECT * FROM  produits ORDER BY added DESC LIMIT 10";
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