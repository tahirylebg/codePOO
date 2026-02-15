<?php

class Merchant extends Building
{
    //Marchand qui vend des objects au héros
    /**
     * @var Item[] Stock (inventaire) du marchand
     */
    private array $stock;
    public function __construct()
    {
        parent::__construct(
            "Merchant",
            "Un marchand proposant divers objets à la vente."
            
        );

        $this->stock = [
            new Sword("Épée en fer", 15, 50),
            new Shield("Bouclier en bois", 10, 40),
            new HealingPotion("Potion mineure", 30, 20)
        ];
    }

    public function addItem(Item $item): void
    {
        // Ajoute un objet au stock du marchand
        $this->stock[] = $item;
    }
    public function sellItem(IHero $hero, Item $item): bool
    {
        // Permet au héros d'acheter un objet au marchand
        // Vérifie si l'objet est bien en stock
        $key = array_search($item, $this->stock, true);
        if ($key === false) {
            echo "Cet objet n'est pas disponible.\n";
            return false;
        }

        // Vérifie si le héros a assez d'or
        if (!$hero->spendGold($item->getPrice())) {
            echo "Pas assez d'or pour acheter {$item->getName()}.\n";
            return false;
        }

        // Ajoute l'objet à l'inventaire du héros
        if (method_exists($hero->getInventory(), 'addPotion') && $item instanceof HealingPotion) {
            $hero->getInventory()->addPotion($item);
        }

        // Retire l'objet du stock
        unset($this->stock[$key]);

        echo "{$hero->getName()} a acheté {$item->getName()}.\n";
        return true;
    }

    public function enter(IHero $hero): void
    {
        // Affiche les objets disponibles à la vente lorsque le héros entre chez le marchand
        echo "{$hero->getName()} entre chez le marchand.\n";

        if (empty($this->stock)) {
            echo "Le marchand n'a plus rien à vendre.\n";
            return;
        }

        echo "Objets disponibles :\n";
        foreach ($this->stock as $index => $item) {
            echo ($index + 1) . ". "
                . $item->getName()
                . " — "
                . $item->getPrice()
                . " or\n";
        }
    }
}
