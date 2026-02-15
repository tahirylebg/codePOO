<?php

/**
 * Classe HealingPotion
 * Représente une potion de soin.
 */
class HealingPotion implements Item
{
    private string $name;
    private int $healingAmount;
    private int $price;

    public function __construct()
    {
        $this->name = "Healing Potion";
        $this->healingAmount = 50;
        $this->price = 30;
    }

    /**
     * Applique le soin au héros
     */
    public function use(IHero $hero): void
    {
        $hero->heal($this->healingAmount);
    }

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
