<?php
require_once 'CompteCourant.php';
require_once 'CompteEpargne.php';

/**
 * Classe représentant une personne cliente de la banque
 */
class Personne {
    /** @var string Nom de la personne */
    private string $nom;

    /** @var string Prénom de la personne */
    private string $prenom;

    /** @var string Adresse postale */
    private string $adresse;

    /** @var string Date de naissance au format YYYY-MM-DD */
    private string $naissance;

    /** @var Compte[] Liste des comptes associés à la personne */
    private array $comptes = [];

    /**
     * Constructeur
     * @param string $nom
     * @param string $prenom
     * @param string $adresse
     * @param string $naissance
     */
    public function __construct(string $nom, string $prenom, string $adresse, string $naissance) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->naissance = $naissance;
    }

    /**
     * Ouvrir un nouveau compte (courant ou épargne)
     * @param float $montantInitial Montant du dépôt initial
     * @param string $type Type de compte ('courant' ou 'epargne')
     * @param float $taux Taux d'intérêt pour un compte épargne
     * @return Compte Le compte créé
     */
    public function ouvrirCompte(float $montantInitial, string $type = 'courant', float $taux = 0.02): Compte {
        if ($type === 'epargne') {
            $compte = new CompteEpargne($montantInitial, 'EUR', $this, $taux);
        } else {
            $compte = new CompteCourant($montantInitial, 'EUR', $this);
        }
        $this->comptes[] = $compte;
        return $compte;
    }

    /**
     * Obtenir la liste des comptes associés à la personne
     * @return array
     */
    public function getComptes(): array {
        return $this->comptes;
    }

    /**
     * Obtenir le nom
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Modifier le nom
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * Obtenir le prénom
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Modifier le prénom
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * Obtenir l'adresse
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * Modifier l'adresse
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * Obtenir la date de naissance
     * @return string
     */
    public function getNaissance(): string
    {
        return $this->naissance;
    }

    /**
     * Modifier la date de naissance
     * @param string $naissance Date au format YYYY-MM-DD
     */
    public function setNaissance(string $naissance): void
    {
        $this->naissance = $naissance;
    }

    /**
     * Obtenir le nom complet de la personne
     * @return string
     */
    public function __toString(): string {
        return $this->prenom . ' ' . $this->nom . ' - ' . $this->adresse . ' - Né le ' . (new DateTime($this->naissance))->format('d/m/Y');
    }
}
