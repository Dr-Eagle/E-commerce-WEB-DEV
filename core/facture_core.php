<?PHP
class Facture_core
{
    function afficher_facture($Facture)
    {
        echo "ide_commande: " . $Facture->getide_commande() . "<br>";
    }

    function affiche_facture()
    {

        $sql = "SElECT * From facture";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouter_facture($Facture)
    {
        $sql = "INSERT into facture (ide_commande) 
        values (:ide_commande)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);


            $ide_commande = $Facture->getide_commande();

            $req->bindValue(':ide_commande', $ide_commande);

            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimer_facture($id_facture)
    {
        $sql = "DELETE from facture where id_facture=:id_facture";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_facture', $id_facture);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifier_facture($Facture, $id_facture)
    {
        $sql = "UPDATE facture SET ide_commande=:ide_commande WHERE id_facture=:id_facture";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $ide_commande = $Facture->getide_commande();

            $req->bindValue(':ide_commande', $ide_commande);
			$req->bindValue(':id_facture', $id_facture);


             $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }

    function recuperer_facture($id_facture)
    {
        $sql = "SELECT * from facture where id_facture=$id_facture";
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
 