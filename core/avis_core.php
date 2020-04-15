<?php
class Avis_core
{    
    function afficher_avis()
	{
		$sql="select * from avis";
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
    
    function affiche_avis()
    {

        $sql = "SElECT * From avis";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

	function ajouter_avis($Avis)
    { 
        $sql="insert into Avis (nom,prenom,nom_produit,email,note) values (:nom,:prenom,:nom_produit,:email,:note)";
        $db =config::getconnexion();
        try
        { 
            $nom=$Avis->get_nom();
            $prenom=$Avis->get_prenom();
            $nom_produit=$Avis->get_nom_produit();
            $email=$Avis->get_email();        
            $note=$Avis->get_note();
            


            $req=$db->prepare($sql);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':nom_produit',$nom_produit); 
            $req->bindValue(':note',$note); 
            $req->bindValue(':email',$email);
            
            $req->execute();
        }
        catch(execption $e)
        {
            die('erreur'); 
        }
    }

   function supprimer_avis($id_avis)
   {
        $sql="DELETE FROM avis WHERE id_avis=:id_avis";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_avis',$id_avis);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
 
 function modifier_avis($Avis, $id_avis)
    {
        $sql = "UPDATE avis SET nom=:nom,prenom=:prenom,nom_produit=:nom_produit,email=:email,note=:note where id_avis=:id_avis";

        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $nom = $Avis->get_nom();
            $prenom = $Avis->get_prenom();
            $nom_produit = $Avis->get_nom_produit();
            $email = $Avis->get_email();
            $note = $Avis->get_note();
            

            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':nom_produit', $nom_produit);
            $req->bindValue(':email', $email);
            $req->bindValue(':note', $note);
            $req->bindValue(':id_avis', $id_avis);


            $req->execute();
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
        }
    }
 function recuperer_avis($id_avis)
 {
    $sql = "SELECT * from avis where id_avis=$id_avis";
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