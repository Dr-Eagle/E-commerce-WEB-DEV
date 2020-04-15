
<?php 
include "include.php";
	require_once"../../core/admin_core.php";
    include "../../entities/admin.php";
$admin1 = new Admin_core();
$admin = $admin1->affiche_admin();


if (!empty($_POST['login']) && !empty($_POST['mot_pass'])){
	
	foreach($admin as $t){
		
	if ($t['email']==$_POST['login'] && $t['mot_de_passe']==$_POST['mot_pass']){
		
		session_start();
		$_SESSION['admin']=$t['id_admin'];
		
		header("location:index.php");
		
		}
	
	 
	 }

}	  
 
else { 
    header("location:formulaire_connexion.php");
}  

?> 
