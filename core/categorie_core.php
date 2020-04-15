<?PHP
class Categorie_core
{
    function afficher_categorie($Categorie)
    {
        echo "id_categorie: " . $Categorie->getid_categorie() . "<br>";
        echo "nom_categorie: " . $Categorie->getnom_categorie() . "<br>";
        echo "lien_categorie: " . $Categorie->getlien_categorie() . "<br>";
    }

    function affiche_categorie()
    {

        $sql = "SElECT * From categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouter_Categorie($Categorie)
    {
        $sql = "INSERT into categorie (nom_categorie,lien_categorie) 
        values (:nom_categorie,:lien_categorie)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);


            $nom_categorie = $Categorie->getnom_categorie();
            $lien_categorie = $Categorie->getlien_categorie();

            $req->bindValue(':nom_categorie', $nom_categorie);
            $req->bindValue(':lien_categorie', $lien_categorie);

            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimer_categorie($id_categorie)
    {
        $sql = "DELETE from categorie where id_categorie=:id_categorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_categorie', $id_categorie);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifier_categorie($Categorie, $id_categorie)
    {
        $sql = "UPDATE categorie SET nom_categorie=:nom_categorie,lien_categorie=:lien_categorie WHERE id_categorie=:id_categorie";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nom_categorie = $Categorie->getnom_categorie();
            $lien_categorie = $Categorie->getlien_categorie();


            $req->bindValue(':nom_categorie', $nom_categorie);
            $req->bindValue(':lien_categorie', $lien_categorie);
            $req->bindValue(':id_categorie',$id_categorie);


             $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }

    function recuperer_categorie($id_categorie)
    {
        $sql = "SELECT * from categorie where id_categorie=$id_categorie";
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
 