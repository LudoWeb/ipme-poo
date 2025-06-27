<?php
require_once 'Compte.php';
require_once 'Remunerable.php';

/**
 * Classe représentant un compte épargne avec taux d'intérêt
 */
class CompteEpargne extends Compte implements Remunerable {
    /** @const float Taux d'intérêt utilisé pour tous les comptes */
    public const TAUX_INTERET = 0.03;

    /**
     * Constructeur
     * @param float $soldeInitial
     * @param string $devise
     * @param Personne $proprietaire
     * @param float $tauxInteret
     */
    public function __construct(float $soldeInitial, string $devise, Personne $proprietaire) {
        parent::__construct($soldeInitial, $devise, $proprietaire);
    }

    /**
     * Appliquer les intérêts au solde du compte
     */
    public function appliquerInterets(): void {
        $this->solde += $this->solde * self::TAUX_INTERET;
    }
}
