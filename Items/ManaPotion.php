<?php

/**
 * Classe ManaPotion
 * Représente une potion qui restaure le mana du héros.
 */
class ManaPotion implements Item
{
    private string $name;
    private int $manaAmount;
    private int $price;

    public function __construct()
    {
        $this->name = "Mana Potion";
        $this->manaAmount = 50; // Restaure 50 mana
        $this->price = 40;
    }

    /**
     * Applique la restauration de mana au héros
     */
    public function use(IHero $hero): void
    {
        $hero->restoreMana($this->manaAmount);
        echo $hero->getName() . " a utilisé une potion de mana et a restauré " . $this->manaAmount . " mana !\n";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getManaAmount(): int
    {
        return $this->manaAmount;
    }
}
