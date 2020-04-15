<?PHP

class Composite_product_core {
function afficher_Composite_product ($Composite_product){
		
		echo "titre1: ".$Composite_product->gettitre1()."<br>";
		echo "titre2: ".$Composite_product->gettitre2()."<br>";

		echo "nom_option1: ".$Composite_product->getnom_option1()."<br>";
        echo "nom_option2: ".$Composite_product->getnom_option2()."<br>";
		echo "nom_option3: ".$Composite_product->getnom_option3()."<br>";

        echo "image_option1: ".$Composite_product->getimage_option1()."<br>";
        echo "image_option2: ".$Composite_product->getimage_option2()."<br>";
        echo "image_option3: ".$Composite_product->getimage_option3()."<br>";

        echo "description_option1: ".$Composite_product->getdescription_option1()."<br>";
        echo "description_option2: ".$Composite_product->getdescription_option2()."<br>";
        echo "description_option3: ".$Composite_product->getdescription_option3()."<br>";

        echo "prix_option1: ".$Composite_product->getprix_option1()."<br>";
        echo "prix_option2: ".$Composite_product->getprix_option2()."<br>";
        echo "prix_option3: ".$Composite_product->getprix_option3()."<br>";
        echo "type1: ".$Composite_product->gettype1()."<br>";


	}
    function affiche_Composite_product(){ 

        $sql="SElECT * From composite_product";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
	function ajouter_Composite_product($Composite_product){
		$sql="insert into Composite_product (titre1,titre2,nom_option1,nom_option2,nom_option3,image_option1,image_option2,image_option3,description_option1,description_option2,description_option3,prix_option1,prix_option2,prix_option3,type1) 
		values (:titre1,:titre2,:nom_option1,:nom_option2,:nom_option3,:image_option1,:image_option2,:image_option3,:description_option1,:description_option2,:description_option3,:prix_option1,:prix_option2,:prix_option3,:type1)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
       
        $titre1=$Composite_product->gettitre1();
        $titre2=$Composite_product->gettitre2();

        $nom_option1=$Composite_product->getnom_option1();
        $nom_option2=$Composite_product->getnom_option2();
        $nom_option3=$Composite_product->getnom_option3();

        $image_option1=$Composite_product->getimage_option1();
        $image_option2=$Composite_product->getimage_option2();
        $image_option3=$Composite_product->getimage_option3();

        $description_option1=$Composite_product->getdescription_option1();
        $description_option2=$Composite_product->getdescription_option2();
        $description_option3=$Composite_product->getdescription_option3();

        $prix_option1=$Composite_product->getprix_option1();
        $prix_option2=$Composite_product->getprix_option2();
        $prix_option3=$Composite_product->getprix_option3();
        $type1=$Composite_product->gettype1();
  
		
		$req->bindValue(':titre1',$titre1);
		$req->bindValue(':titre2',$titre2);

		$req->bindValue(':nom_option1',$nom_option1);
        $req->bindValue(':nom_option2',$nom_option2);
        $req->bindValue(':nom_option3',$nom_option3);

        $req->bindValue(':image_option1',$image_option1);
        $req->bindValue(':image_option2',$image_option2);
        $req->bindValue(':image_option3',$image_option3);

        $req->bindValue(':description_option1',$description_option1);
        $req->bindValue(':description_option2',$description_option2);
        $req->bindValue(':description_option3',$description_option3);

        $req->bindValue(':prix_option1',$prix_option1);
        $req->bindValue(':prix_option2',$prix_option2);
        $req->bindValue(':prix_option3',$prix_option3);
        $req->bindValue(':type1',$type1);
        
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function supprimer_Composite_product($id_Composite_product){
		$sql="DELETE FROM Composite_product where id_Composite_product= :id_Composite_product";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_Composite_product',$id_Composite_product);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifier_composite_product($Composite_product,$id_Composite_product){
		$sql="UPDATE composite_product SET titre1=:titre1,titre2=:titre2,nom_option1=:nom_option1,nom_option2=:nom_option2,nom_option3=:nom_option3,image_option1=:image_option1,image_option2=:image_option2,image_option3=:image_option3,description_option1=:description_option1,description_option2=:description_option2,description_option3=:description_option3,prix_option1=:prix_option1,prix_option2=:prix_option2,prix_option3=:prix_option3,type1=:type1 WHERE id_composite_product=:id_composite_product";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
        $titre1=$Composite_product->gettitre1();
        $titre2=$Composite_product->gettitre2();

        $nom_option1=$Composite_product->getnom_option1();
        $nom_option2=$Composite_product->getnom_option2();
        $nom_option3=$Composite_product->getnom_option3();

        $image_option1=$Composite_product->getimage_option1();
        $image_option2=$Composite_product->getimage_option2();
        $image_option3=$Composite_product->getimage_option3();

        $description_option1=$Composite_product->getdescription_option1();
        $description_option2=$Composite_product->getdescription_option2();
        $description_option3=$Composite_product->getdescription_option3();

        $prix_option1=$Composite_product->getprix_option1();
        $prix_option2=$Composite_product->getprix_option2();
        $prix_option3=$Composite_product->getprix_option3();
        $type1=$Composite_product->gettype1();
        
        $req->bindValue(':titre1',$titre1);
		$req->bindValue(':titre2',$titre2);

		$req->bindValue(':nom_option1',$nom_option1);
        $req->bindValue(':nom_option2',$nom_option2);
        $req->bindValue(':nom_option3',$nom_option3);

        $req->bindValue(':image_option1',$image_option1);
        $req->bindValue(':image_option2',$image_option2);
        $req->bindValue(':image_option3',$image_option3);

        $req->bindValue(':description_option1',$description_option1);
        $req->bindValue(':description_option2',$description_option2);
        $req->bindValue(':description_option3',$description_option3);

        $req->bindValue(':prix_option1',$prix_option1);
        $req->bindValue(':prix_option2',$prix_option2);
        $req->bindValue(':prix_option3',$prix_option3);
        $req->bindValue(':type1',$type1);
        $req->bindValue(':id_composite_product',$id_Composite_product);
      
		
		
            $req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}

    function recuperer_Composite_product($id_Composite_product){
        $sql="SELECT * from Composite_product where id_Composite_product=$id_Composite_product";
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