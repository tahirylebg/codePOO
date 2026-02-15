<?php
class Inventory
{
    // Gere l'inventaire du héros, notamment les potions de soin
    /**
     * @var HealingPotion[] Liste des potions de soin
     */
    private array $potions;

    private int $maxPotion;
    public function __construct()
    {
        $this->potions = [];
        $this->maxPotion = 10; // Limite le nombre de potions que le héros peut porter   
    }

    // Permet d'ajouter une potion de soin à l'inventaire
    public function addPotion(HealingPotion $potion): bool
    {
        if (count($this->potions) >= $this->maxPotion) {
            return false;
        }

        $this->potions[] = $potion;
        return true;
    }
    public function usePotion(IHero $hero): bool
    {
        // Permet d'utiliser une potion de soin sur le héros
        if (empty($this->potions)) {
            return false;
        }

        // Prend la première potion
        $potion = array_shift($this->potions);
        $potion->use($hero);

        return true;
    }

        // Retourne le nombre de potions de soin dans l'inventaire
    public function getPotionCount(): int
    {
        return count($this->potions);
    }
}
