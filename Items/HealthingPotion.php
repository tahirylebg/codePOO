<?php

/**
 * Classe HealthingPotion
 * Représente une potion de soin dans le jeu.
 * Cette classe étend AItem, héritant de ses propriétés et méthodes,
 * et fournit une implémentation spécifique pour une potion de soin qui restaure 50 points de vie et coûte 30 pièces d'or.
 * Les personnages peuvent utiliser des potions de soin pour récupérer des points de vie pendant les combats
 * et ainsi augmenter leurs chances de survie face aux ennemis. 
 */

class HealthingPotion extends IItem {

    // Propriétés de la potion de soin
    private string $name;
    // Quantité de points de vie restaurés par la potion
    private int $healingAmount;
    // Prix de la potion en pièces d'or
    private int $price;

    public function __construct()
    {
        $this->name = "Healthing Potion";
        $this->healingAmount = $healAmount;
        $this->price = 50;
    }

     /**
     * Applique le soin au héros.
     */
    public function use(Hero $hero): void
    {
        $hero->heal($this->healAmount);
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

    public function getHealingAmount(): int
    {
        return $this->healingAmount;
    }
}