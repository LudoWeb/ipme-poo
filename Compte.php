<?php
require_once 'Personne.php';

/**
 * Classe abstraite représentant un compte bancaire générique
 */
abstract class Compte {
    /** @var int Numéro unique du compte */
    protected int $numero;

    /** @var float Solde du compte */
    protected float $solde;

    /** @var string Devise utilisée */
    protected string $devise;

    /** @var Personne Propriétaire du compte */
    protected Personne $proprietaire;

    /** @var int Compteur statique des comptes créés */
    public static int $nbComptes = 0;

    /**
     * Constructeur
     * @param float $soldeInitial
     * @param string $devise
     * @param Personne $proprietaire
     */
    public function __construct(float $soldeInitial, string $devise, Personne $proprietaire) {
        $this->numero = ++self::$nbComptes;
        $this->solde = $soldeInitial;
        $this->devise = $devise;
        $this->proprietaire = $proprietaire;
    }

    /**
     * Déposer une somme sur le compte
     * @param float $montant
     */
    public function deposer(float $montant): void {
        $this->solde += $montant;
    }

    /**
     * Retirer une somme du compte
     * @param float $montant
     * @throws Exception
     */
    public function retirer(float $montant): void {
        if ($montant > $this->solde) {
            throw new Exception("Attention, solde insuffisant pour retirer {$montant} {$this->devise}. Solde actuel: {$this->solde} {$this->devise}.");
        }
        $this->solde -= $montant;
    }

    /**
     * Récupérer le solde actuel
     * @return float
     */
    public function getSolde(): float {
        return $this->solde;
    }

    /**
     * Retourne une représentation textuelle du compte
     * @return string
     */
    public function __toString(): string {
        return "Compte #{$this->numero} - Solde: {$this->solde} {$this->devise}";
    }
}
