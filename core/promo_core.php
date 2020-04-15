<?php




/**
* 
*/
class promo_core 
{


	
	function __construct()
	{
		# cosxq..	
	}




	public static function afficher_promotion()
	{

		$c = config::getConnexion();


		try {
			$liste=$c->query("SELECT * FROM promotion ORDER BY id_pro DESC ");
			return $liste;
			
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
			
		}
	}

        private $id_pro;
        private $id_produit;
		private $reduc;
		private $dated;
		private $datef;
		

               

	function ajouter_promotion($bk)
	{   
		$sql = "insert into promotion (id_produit,reduc,dated,datef) 
		values(:id_produit,:reduc,:dated,:datef)";
		$c = config::getConnexion();

		try {

			$req = $c->prepare($sql);
			$req->bindvalue(':id_produit',$bk->getId_produit());
			$req->bindvalue(':reduc',$bk->getReduc());
			$req->bindvalue(':dated',$bk->getDated());
			$req->bindvalue(':datef',$bk->getDatef());

			$req->execute();
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}

	}

	public static function getProduct()
	{
		$c = config::getConnexion();


		try {
			$liste=$c->query("SELECT * FROM produit ");
			return $liste;
			
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
			
		}
	}




	public static function delete_promotion($bk)
	{

		var_dump($bk);
		$pdo = config::getConnexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM promotion  WHERE id_pro = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($bk));
	}



	function update_promotion($bk)
	{

		$pdo= config::getConnexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE promotion  set reduc = ? ,dated=?, datef=? where id_pro=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($bk->getReduc(),$bk->getDated(),$bk->getDatef(),$bk->getId_pro()));
	}



	function recherche_promotion($nom_ev,$dated)
	{
		$c = Connexion::getConnexion();
                           
                            $sql = "SELECT * FROM evenement WHERE nom_ev like '%$nom_ev%' and date_ev like '%$dated%'   ";


                        $bks = $c->query($sql);
return $bks;
	}





function nbrpage()
{
		$c = Connexion::getConnexion();

	    $req = $c->query("SELECT count(*) as NbNews FROM promotion ");
                        $rows = $req->fetch();

                        return $rows;
}



function recherchepardate($dated)
	{	$c = Connexion::getConnexion();

	          $req = $c->query("SELECT count(*) as NbNews FROM promotion WHERE  dated like '%$dated%' ");
                        $rows = $req->fetch();
                        return $rows;

}

function rechercheparreduc($reduc)
	{		$c = config::getConnexion();


	          $req = $c->query("SELECT count(*) as NbNews FROM promotion WHERE  reduc like '%$reduc%' ");
                        $rows = $req->fetch();
                        return $rows;

}

public static function tripromotion()
{
		$c = config::getConnexion();

	$sql = "SELECT * FROM promotion ORDER by dated";
$evs = $c->query($sql);
return $evs;

}
public static function trireducpromotion()
{
		$c = config::getConnexion();

	$sql = "SELECT * FROM promotion ORDER by reduc";
$evs = $c->query($sql);
return $evs;

}


public static function afficherdapresid($id_pro)
{
		$c = config::getConnexion();
$sql = "SELECT * FROM promotion WHERE id_pro = ".$id_pro."";
$req = $c->query($sql);
return $req;
}




}
















?>
