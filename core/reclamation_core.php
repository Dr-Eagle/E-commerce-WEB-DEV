<?php
class Reclamation_core
{    
    function afficher_reclamation()
	{
		$sql="select * from reclamation";
		$db =config::getconnexion();
		try
		{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(execption $e)
		{
			die('erreur'); 
		}
    }
    
    function affiche_reclamation()
    {

        $sql = "SElECT * From reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

	function ajouter_reclamation($Reclamation)
    { 
        $sql="insert into Reclamation (nom,prenom,telephone,email,objet,message) values (:nom,:prenom,:telephone,:email,:objet,:message)";
        $db =config::getconnexion();
        try
        { 
            $nom=$Reclamation->get_nom();
            $prenom=$Reclamation->get_prenom();
             $email=$Reclamation->get_email();
            $telephone=$Reclamation->get_telephone();
           
            $objet=$Reclamation->get_objet();
            $message=$Reclamation->get_message();
            //$ide_facture=$Reclamation->getide_facture();


            $req=$db->prepare($sql);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':telephone',$telephone);
            $req->bindValue(':email',$email);
            $req->bindValue(':objet',$objet);
            $req->bindValue(':message',$message);
            //$req->bindValue(':ide_facture',$Reclamation->getide_facture());
            $req->execute();
        }
        catch(execption $e)
        {
            die('erreur'); 
        }
    }

   function supprimer_reclamation($id_reclamation)
   {
        $sql="DELETE FROM reclamation WHERE id_reclamation=:id_reclamation";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_reclamation',$id_reclamation);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifier_reclamation($Reclamation, $id_reclamation)
    {
        $sql = "UPDATE reclamation SET nom=:nom,prenom=:prenom,telephone=:telephone,email=:email,objet=:objet,message=:message";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nom = $Reclamation->get_nom();
            $prenom = $Reclamation->get_prenom();
            $telephone = $Reclamation->get_telephone();
            $email = $Reclamation->get_email();
            $objet = $Reclamation->get_note();
            $message = $Reclamation->get_Message();
            

            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':telephone', $telephone);
            $req->bindValue(':email', $email);
            $req->bindValue(':objet', $objet);
            $req->bindValue(':message', $message);
            $req->bindValue(':id_reclamation', $id_reclamation);


            $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }
 function recuperer_reclamation($id_reclamation)
 {
    $sql = "SELECT * from reclamation where id_reclamation=$id_reclamation";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
 }
 public static function tri_reclamation_nom()
{
        $db = config::getConnexion();

    $sql = "SELECT * FROM reclamation ORDER by nom";
$evs = $db->query($sql);
return $evs;

}
public static function tri_reclamation_prenom()
{
        $db = config::getConnexion();

    $sql = "SELECT * FROM Reclamation ORDER by prenom";
$evs = $db->query($sql);
return $evs;

}
}


?>