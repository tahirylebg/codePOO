<?php
class Inventory
{
    /**
     * @var Item[] Liste des items dans l'inventaire
     */
    private array $items;

    private int $maxItems;
    
    public function __construct()
    {
        $this->items = [];
        $this->maxItems = 20; // Limite le nombre d'items que le héros peut porter   
    }

    /**
     * Ajoute un item à l'inventaire
     */
    public function addItem(Item $item): bool
    {
        if (count($this->items) >= $this->maxItems) {
            return false;
        }

        $this->items[] = $item;
        return true;
    }

    /**
     * Utilise une potion de soin sur le héros
     */
    public function usePotion(IHero $hero): bool
    {
        if (empty($this->items)) {
            return false;
        }

        // Cherche la première potion
        foreach ($this->items as $index => $item) {
            if ($item instanceof HealingPotion) {
                $item->use($hero);
                unset($this->items[$index]);
                $this->items = array_values($this->items); // Réindexe le tableau
                return true;
            }
        }

        return false;
    }

    /**
     * Retourne le nombre de potions dans l'inventaire
     */
    public function getPotionCount(): int
    {
        $count = 0;
        foreach ($this->items as $item) {
            if ($item instanceof HealingPotion) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * Retourne tous les items
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Supprime un item à un index donné
     */
    public function removeItem(int $index): void
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Réindexe le tableau
    }

    /**
     * Retourne le nombre total d'items
     */
    public function getItemCount(): int
    {
        return count($this->items);
    }
}
