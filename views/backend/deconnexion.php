<?php 
session_start();
session_destroy();

header("location:formulaire_connexion.php");
?> 