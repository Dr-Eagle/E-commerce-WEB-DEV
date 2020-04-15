<?PHP



$categorie1 = new Categorie_core();
$categorie = $categorie1->affiche_categorie();

$facture1 = new Facture_core();
$facture = $facture1->affiche_facture();

$livraison1 = new  Livraison_core();
$livraison = $livraison1->affiche_livraison();


$catalogue1 = new Catalogue_core();
$catalogue = $catalogue1->affiche_catalogue();

$sousCategorie1 = new Sous_categorie_Core();
$sous_categorie = $sousCategorie1->affiche_sous_categorie();

$produit1 = new Produit_core();
$produit = $produit1->affiche_produit();

$livreur1 = new Livreur_core();
$livreur = $livreur1->affiche_livreur();

$commande1 = new Commande_core();
$commande = $commande1->affiche_commande();

$panier1 = new Panier_core();
$panier = $panier1->affiche_panier();

$admin1 = new Admin_core();
$admin = $admin1->affiche_admin();

$client1 = new Client_core();
$client = $client1->affiche_client();

?>

<div class="header">
    <h1 class="logo">
        <img src="img/logo.jpg" alt="logo-sbs">
    </h1>
    
</div> 