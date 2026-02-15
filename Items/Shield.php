<?php

/**
 * Classe Shield
 * Représente un bouclier dans le jeu.
 * Cette classe implémente l'interface IItem, ce qui signifie qu'elle doit fournir des méthodes pour obtenir le nom et le prix du bouclier.
 * En plus de cela, elle a une propriété de protection qui indique combien de dégâts le bouclier peut absorber.
 * Les personnages peuvent utiliser des boucliers pour réduire les dégâts subis lors des combats.
 */

class Shield implements Item
{
    // Propriétés du bouclier
    private string $name;
    // Protection offerte par le bouclier
    private int $protection;
    // Prix du bouclier en pièces d'or
    private int $price;

    //Constructeur pour initialiser les propriétés du bouclier
    public function __construct(string $name, int $protection, int $price)
    {
        $this->name = $name;
        $this->protection = $protection;
        $this->price = $price;
    }

    // Implémentation des méthodes de l'interface IItem
    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getProtection(): int
    {
        return $this->protection;
    }
}
