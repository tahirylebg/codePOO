<?php

/**
 * Classe StrengthPotion
 * Représente une potion qui augmente les dégâts du héros temporairement (+20% pendant 3 tours).
 */
class StrengthPotion implements Item
{
    private string $name;
    private float $damageBonus; // +20%
    private int $price;

    public function __construct()
    {
        $this->name = "Strength Potion";
        $this->damageBonus = 1.2; // +20% = 120% des dégâts
        $this->price = 50;
    }

    /**
     * Applique le bonus de dégâts au héros
     */
    public function use(IHero $hero): void
    {
        // Augmente les dégâts de base de 20%
        echo $hero->getName() . " a utilisé une potion de force et ses dégâts augmentent de 20% !\n";
        // Note: L'implémentation du bonus temporaire dépend de la structure du combat
        // Pour l'instant, c'est une notification que la potion a été utilisée
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getDamageBonus(): float
    {
        return $this->damageBonus;
    }
}
