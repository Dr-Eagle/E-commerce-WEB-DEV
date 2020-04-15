<?php




/**
* 
*/
class Event_core 
{


	
	function __construct()
	{
		# cosxq..	
	}

	public static function Like($id_user,$id_event)
	{
		$sql = "insert into like_event(id_user,id_event) values(:id_user,:id_event)";
		$c = config::getConnexion();

		try {

			$req = $c->prepare($sql);
			$req->bindvalue(':id_user',$id_user);
			$req->bindvalue(':id_event',$id_event);
			$req->execute();
			
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
	}

	public static function isLiked($iduser,$idevent)
	{
		$sql="select * from like_event where id_user=:iduser and id_event=:idevent";
		$c=config::getConnexion();

		try
		{
			$req=$c->prepare($sql);
			$req->bindvalue(':iduser',$iduser);
			$req->bindvalue(':idevent',$idevent);
			$req->execute();
			if($req->rowCount()>0)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public static function Dislike($iduser,$idevent)
	{
		$sql="delete from like_event where id_user=:iduser and id_event=:idevent";
		$c=config::getConnexion();

		try
		{
			$req=$c->prepare($sql);
			$req->bindvalue(':iduser',$iduser);
			$req->bindvalue(':idevent',$idevent);
			$req->execute();

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public static function participer($id_user,$id_event)
	{
		$sql = "insert into participants(id_user,id_event) values(:id_user,:id_event)";
		$c = config::getConnexion();

		try {

			$req = $c->prepare($sql);
			$req->bindvalue(':id_user',$id_user);
			$req->bindvalue(':id_event',$id_event);
			$req->execute();
			
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
	}

	public static function isParticpated($iduser,$idevent)
	{
		$sql="select * from participants where id_user=:iduser and id_event=:idevent";
		$c=config::getConnexion();

		try
		{
			$req=$c->prepare($sql);
			$req->bindvalue(':iduser',$iduser);
			$req->bindvalue(':idevent',$idevent);
			$req->execute();
			if($req->rowCount()>0)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public static function annulerParticipation($iduser,$idevent)
	{
		$sql="delete from participants where id_user=:iduser and id_event=:idevent";
		$c=config::getConnexion();

		try
		{
			$req=$c->prepare($sql);
			$req->bindvalue(':iduser',$iduser);
			$req->bindvalue(':idevent',$idevent);
			$req->execute();

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public static function getusers()
	{
		$c = config::getConnexion();


		try {
			$liste=$c->query("SELECT * FROM client ");
			return $liste;
			
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
			
		}
	}




	public static function afficher_evenement()
	{

		$c = config::getConnexion();


		try {
			$liste=$c->query("SELECT * FROM event ORDER BY id_ev DESC ");
			return $liste;
			
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
			
		}
	}

        private $id_ev;
		private $nom_ev;
		private $description;
		private $type;
		private $dated;
		private $datef;
		private $img;
		

               

	function ajouter_evenement($bk)
	{   
		$sql = "insert into event (nom_ev,description,type,dated,datef,img) 
		values(:nom_ev,:description,:type,:dated,:datef,:img)";
		$c = config::getConnexion();

		try {

			$req = $c->prepare($sql);
			$req->bindvalue(':nom_ev',$bk->getNom_ev());
			$req->bindvalue(':description',$bk->getDescription());
			$req->bindvalue(':type',$bk->getType());
			$req->bindvalue(':dated',$bk->getDated());
			$req->bindvalue(':datef',$bk->getDatef());
			$req->bindvalue(':img',$bk->getImg());
			
			



			$req->execute();
			
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}

	}




	public static function delete_evenement($bk)
	{


		$pdo = config::getConnexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM event  WHERE id_ev = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($bk));
	}



	function update_evenement($bk)
	{

		$pdo= config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE event  set nom_ev = ?, description = ?, type =? ,dated=?, datef=?,  img=? where id_ev=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($bk->getNom_ev(),$bk->getDescription(),$bk->getType(),$bk->getDated(),$bk->getDatef(),$bk->getImg(),$bk->getId_ev()));
	}



	function recherche_evenement($nom_ev,$dated)
	{
		$c = Connexion::getConnexion();
                           
                            $sql = "SELECT * FROM evenement WHERE nom_ev like '%$nom_ev%' and date_ev like '%$dated%'   ";


                        $bks = $c->query($sql);
return $bks;
	}





public static function nbrpage()
{
		$c = config::getConnexion();

	    $req = $c->query("SELECT count(*) as NbNews FROM event ");
                        $rows = $req->fetch();

                        return $rows;
}

function nbrpagerechercher($nom_ev,$dated)
	{	$c = Connexion::getConnexion();

	          $req = $c->query("SELECT count(*) as NbNews FROM evenement WHERE nom_ev like '%$nom_ev%' && date_ev like '%$date_ev%' ");/*page to page RECHERCHE*/
                        $rows = $req->fetch();
                        return $rows;

}


function recherchepardate($dated)
	{	$c = Connexion::getConnexion();

	          $req = $c->query("SELECT count(*) as NbNews FROM evenement WHERE  date_ev like '%$date_ev%' ");
                        $rows = $req->fetch();
                        return $rows;

}

function recherchepartype($type)
	{	$c = Connexion::getConnexion();	

	          $req = $c->query("SELECT count(*) as NbNews FROM evenement WHERE  type like '%$type%' ");
                        $rows = $req->fetch();
                        return $rows;

}

function trievenement()
{
		$c = Connexion::getConnexion();

	$sql = "SELECT * FROM evenement ORDER by dated";
$evs = $c->query($sql);
return $evs;

}


public static function afficherdapresid($id_ev)
{
		$c = config::getConnexion();
$sql = "SELECT * FROM event WHERE id_ev = ".$id_ev."";
$req = $c->query($sql);
return $req;
}




}
















?>
