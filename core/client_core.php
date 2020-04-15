<?PHP
class Client_core
{
    function afficher_client($Client)
    {
        echo "id_client: " . $Client->getid_client() . "<br>";
        echo "nom: " . $Client->getnom() . "<br>";
        echo "prenom: " . $Client->getprenom() . "<br>";
        echo "mot_de_passe: " . $Client->getmot_de_passe() . "<br>";
        echo "date_naissance: " . $Client->getdate_de_naissance() . "<br>";
        echo "email: " . $Client->getemail() . "<br>";
        echo "sexe: " . $Client->getsexe() . "<br>";
        echo "image_profil: " . $Client->getimage_profil() . "<br>";
    }


    function affiche_client()
    {

        $sql = "SElECT * From client";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouter_client($Client)
    {
        $sql = "insert into client (nom,prenom,mot_de_passe,date_naissance,email,sexe,image_profil) 
		values (:nom,:prenom,:mot_de_passe,:date_naissance,:email,:sexe,:image_profil)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);


            $nom = $Client->getnom();
            $prenom = $Client->getprenom();
            $mot_de_passe = $Client->getmot_de_passe();
            $date_naissance = $Client->getdate_de_naissance();
            $email = $Client->getemail();
            $sexe = $Client->getsexe();
            $image_profil = $Client->getimage_profil();



            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':mot_de_passe', $mot_de_passe);
            $req->bindValue(':date_naissance', $date_naissance);
            $req->bindValue(':email', $email);
            $req->bindValue(':sexe', $sexe);
            $req->bindValue(':image_profil', $image_profil);



            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimer_client($id_client)
    {
        $sql = "DELETE from client where id_client= :id_client";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_client', $id_client);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifier_client($Client, $id_client)
    {
        $sql = "UPDATE client SET nom=:nom,prenom=:prenom,mot_de_passe=:mot_de_passe,date_naissance=:date_naissance,email=:email,sexe=:sexe,image_profil=:image_profil WHERE id_client=:id_client";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nom = $Client->getnom();
            $prenom = $Client->getprenom();
            $mot_de_passe = $Client->getmot_de_passe();
            $date_naissance = $Client->getdate_de_naissance();
            $email = $Client->getemail();
            $sexe = $Client->getsexe();
            $image_profil = $Client->getimage_profil();


            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':mot_de_passe', $mot_de_passe);
            $req->bindValue('date_naissance', $date_naissance);
            $req->bindValue(':email', $email);
            $req->bindValue(':sexe', $sexe);
            $req->bindValue(':image_profil', $image_profil);
            $req->bindValue(':id_client', $id_client);


            $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }

    public static function triclient()
{
    $db = config::getConnexion();
    $sql = "SELECT * FROM client ORDER by nom ASC";
    
    $liste = $db->query($sql);
    return $liste;
}

public static function triprenomclient()
{
    $db = config::getConnexion();
    $sql = "SELECT * FROM client ORDER by prenom DESC";
    $liste = $db->query($sql);
    return $liste;
}

function recuperer_client($id_client)
{
    $sql = "SELECT * from client where id_client=$id_client";
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
 