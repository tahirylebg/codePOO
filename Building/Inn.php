<?php

class Inn extends Building
{
    // L'auberge permet au héros de se soigner en échange d'or
    private int $healingCost;    // Coût en or pour se soigner
    private int $healingAmount;  // Quantité de soins

    public function __construct(int $healingCost = 10, int $healingAmount = 50)
    {
        parent::__construct(
            "Inn",
            "Une auberge chaleureuse pour récupérer de la vie contre de l'or."
        );

        $this->healingCost = $healingCost;
        $this->healingAmount = $healingAmount;
    }

    // Permet au héros d'entrer dans l'auberge et de se soigner en échange d'or
    public function enter(IHero $hero): void
    {
        echo "🏨 {$hero->getName()} entre dans l'auberge.\n";

        // Vérifie si le héros a assez d'or
        if (!$hero->spendGold($this->healingCost)) {
            echo "Pas assez d'or pour se soigner.\n";
            return;
        }

        // Soigne le héros
        $hero->heal($this->healingAmount);

        echo "{$hero->getName()} récupère {$this->healingAmount} points de vie "
            . "pour {$this->healingCost} pièces d'or.\n";
    }
}
