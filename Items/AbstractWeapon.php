<?php

/**
 * Classe abstraite AbstractWeapon
 * Représente une arme générique dans le jeu.
 * Cette classe fournit une implémentation de base pour les armes,
 * et peut être étendue pour créer des types d'armes spécifiques (épées, arcs, etc.).
 * Elle implémente l'interface IWeapon, garantissant que toutes les armes ont les méthodes nécessaires
 * pour obtenir leur nom, leurs dégâts et leur prix.
 * 
 */

abstract class AbstractWeapon implements IWeapon {

    // Propriétés communes à toutes les armes
    protected string $name;
    // Dégâts infligés par l'arme
    protected int $damage;
    // Prix de l'arme en pièces d'or
    protected int $price;

    // Constructeur pour initialiser les propriétés de l'arme
    public function __construct(string $name, int $damage, int $price)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->price = $price;
    } 

    // Implémentation des méthodes de l'interface IWeapon
    public function getName(): string
    {
        return $this->name;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getPrice(): int
    {
        return $this->price;
    }


} 