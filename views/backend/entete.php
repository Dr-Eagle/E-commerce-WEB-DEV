
<?PHP

$composite_product1=new Composite_product_core();
$composite_product=$composite_product1->affiche_composite_product();

$produit_compose1=new Produit_compose_core();
$produit_compose=$produit_compose1->affiche_produit_compose();

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

$admin_core=new Admin_core();
$admin=$admin_core->affiche_admin();

$panier1 = new Panier_core();
$panier = $panier1->affiche_panier();

$client1 = new Client_core();
$client = $client1->affiche_client();

$reclamation1 = new Reclamation_core;
$reclamation = $reclamation1->affiche_reclamation();

$avis1 = new Avis_core;
$avis = $avis1->affiche_avis();

?>

<div class="header">
    <h1 class="logo">
        <img src="img/logo.jpg" alt="logo-sbs">
    </h1>
    <div class="barre_top">
        <ul class="nav nav-tabs">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Bienvenue </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profil</a>
                    <a class="dropdown-item" href="#">Messages</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="deconnexion.php" class="nav-link">Deconnexion</a>
            </li>
        </ul>

    </div>
</div> 