<?php
class Selection_produit_compose
{
    private $nom_produit_compose;
    private $ide_produit;
    private $ide_panier;
    private $quantite;

    public function __construct($nom_produit_compose,$ide_panier,$ide_produit,$quantite)
    {
        $this->nom_produit_compose=$nom_produit_compose;
        $this->ide_produit=$ide_produit;
        $this->ide_panier=$ide_panier;
        $this->quantite=$quantite;
    }
    public function get_nom_produit_compose()
    {
        return $this->nom_produit_compose;
    }
    public function get_ide_produit()
    {
        return $this->ide_produit;
    }
    public function get_ide_panier()
    {
        return $this->ide_panier;
    }
    public function get_quantite()
    {
        return $this->quantite;
    }
}

?>