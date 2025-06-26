# TP - Système Bancaire Orienté Objet en PHP

## Objectif

Ce TP a pour but de vous faire manipuler la programmation orientée objet en PHP à travers la modélisation d’un système bancaire simple. Vous allez compléter une base de code existante pour permettre à des personnes d’ouvrir des comptes courants ou des comptes épargne.

## Fichiers fournis

- `index.php` : point d’entrée de l’application (à ne pas modifier)
- `uml.png` : schéma UML décrivant les relations entre les classes
- Fichiers PHP à compléter :
  - `Personne.php`
  - `Compte.php`
  - `CompteCourant.php`
  - `CompteEpargne.php`

## Consignes

1. Implémentez les classes selon le diagramme UML :
   - `Personne` : représente un client de la banque
   - `Compte` : classe abstraite commune à tous les comptes
   - `CompteCourant` : hérite de `Compte`, pour les comptes standards
   - `CompteEpargne` : hérite de `Compte`, avec une méthode pour appliquer un taux d’intérêt

2. Respectez les relations entre les classes :
   - Une `Personne` peut posséder plusieurs comptes
   - Chaque `Compte` est lié à un propriétaire
   - La classe `Compte` gère un compteur statique du nombre de comptes créés (`nbComptes`)

3. Méthodes principales à implémenter :
   - `ouvrirCompte(...)` dans `Personne`
   - `deposer(...)`, `retirer(...)`, `getSolde()` dans `Compte`
   - `appliquerInterets()` dans `CompteEpargne`

4. Types attendus :
   - `string`, `int`, `float`, `array` selon le diagramme
   - Respectez les signatures des constructeurs et méthodes

## Exécution

Assurez-vous d’avoir PHP installé (version 8+ recommandée).

Lancer le serveur local :

```bash
php -S localhost:8080
