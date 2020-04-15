<?PHP
class Livraison_core
{
    function afficher_livraison($Livraison)
    {
        echo "ide_facture: " . $Livraison->getide_facture() . "<br>";
        echo "ide_livreur: " . $Livraison->getide_livreur() . "<br>";
		echo "etat: " . $Livraison->get_etat() . "<br>";
    }

    function affiche_livraison()
    {

        $sql = "SElECT * From Livraison";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouter_livraison($Livraison)
    {
        $sql = "INSERT into livraison (ide_facture,ide_livreur,etat) 
        values (:ide_facture,:ide_livreur,:etat)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);


            $ide_facture = $Livraison->getide_facture();
            $ide_livreur = $Livraison->getide_livreur();
			$etat = $Livraison->get_etat();

            $req->bindValue(':ide_facture', $ide_facture);
            $req->bindValue(':ide_livreur', $ide_livreur);
			$req->bindValue(':etat', $etat);

            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimer_livraison($id_livraison)
    {
        $sql = "DELETE from livraison where id_livraison=:id_livraison";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_livraison', $id_livraison);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifier_livraison($Livraison, $id_livraison)
    {
        $sql = "UPDATE livraison SET ide_facture=:ide_facture,ide_livreur=:ide_livreur,etat=:etat WHERE id_livraison=:id_livraison";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $ide_facture = $Livraison->getide_facture();
            $ide_livreur = $Livraison->getide_livreur();
			$etat = $Livraison->get_etat();

            $req->bindValue(':ide_facture', $ide_facture);
            $req->bindValue(':ide_livreur', $ide_livreur);
			$req->bindValue(':etat', $etat);
			$req->bindValue('id_livraison',$id_livraison);


             $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }

    function recuperer_livraison($id_livraison)
    {
        $sql = "SELECT * from livraison where id_livraison=$id_livraison";
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
 