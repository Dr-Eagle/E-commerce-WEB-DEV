<?PHP

class Admin_core {
    function afficher_admin($Admin)
    {
        echo "id_admin: " . $Admin->getid_admin() . "<br>";
        echo "nom: " . $Admin->getnom() . "<br>";
        echo "prenom: " . $Admin->getprenom() . "<br>";
        echo "email " . $Admin->getemail() . "<br>";
        echo "mot_de_passe " . $Admin->getmot_de_passe() . "<br>";
        echo "image_profila: " . $Admin->getimage_profila() . "<br>";
    }


    function affiche_admin()
    {

        $sql = "SElECT * From admin";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouter_admin($Admin)
    {
        $sql = "insert into admin (nom,prenom,email,mot_de_passe,image_profila) 
        values (:nom,:prenom,:email,:mot_de_passe,:image_profila)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nom = $Admin->getnom();
            $prenom = $Admin->getprenom();
            $email = $Admin->getemail();
            $mot_de_passe = $Admin->getmot_de_passe();
            $image_profila = $Admin->getimage_profila();



            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':email', $email);
            $req->bindValue(':mot_de_passe', $mot_de_passe);
            $req->bindValue(':image_profila', $image_profila);


            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function supprimer_admin($id_admin)
    {
        $sql = "DELETE from admin where id_admin= :id_admin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_admin', $id_admin);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifier_admin($Admin, $id_admin)
    {
        $sql = "UPDATE admin SET nom=:nom,prenom=:prenom,email=:email,mot_de_passe=:mot_de_passe,image_profila=:image_profila where id_admin=:id_admin";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nom = $Admin->getnom();
            $prenom = $Admin->getprenom();
            $email = $Admin->getemail();
            $mot_de_passe = $Admin->getmot_de_passe();
            $image_profila = $Admin->getimage_profila();

            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':email', $email);
            $req->bindValue('mot_de_passe', $mot_de_passe);
            $req->bindValue(':image_profila', $image_profila);
            $req->bindValue(':id_admin', $id_admin);




             $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }
    function recuperer_admin($id_admin)
    {
        $sql = "SELECT * from client where id_admin=:id_admin";
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