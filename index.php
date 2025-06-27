<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Personne.php';

// Création d'une nouvelle personne (client)
$client1 = new Personne("Durand", "Claire", "Paris", "1990-03-25");
echo "Client créé : " . $client1 . "<br/><br/>";

// Ouverture de comptes bancaires pour cette personne
/** @var CompteCourant $compte1 Compte courant avec 1000€ */
$compte1 = $client1->ouvrirCompte(1000);

/** @var CompteEpargne $compte2 Compte épargne avec 500€ */
$compte2 = $client1->ouvrirCompte(500, 'epargne');

// Tentative de retrait au-dessus du solde
try {
    $compte1->retirer(1200);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

$compte1->deposer(200); // Dépôt de 200€ sur le compte courant

// Affichage des informations du compte courant
echo "<br/><br/>" . $compte1;

// Affichage des informations du compte épargne avant application des intérêts
echo "<br/><br/>" . $compte2;

// Application des intérêts sur le compte épargne
$compte2->appliquerInterets();

// Affichage des informations du compte épargne après application des intérêts
echo "<br/><br/>" . $compte2;
