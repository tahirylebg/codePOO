<?php

/**
 * Classe Church / Eglise 
 * Bâtiment qui sert au héros de recevoir une bénédiction ou une malédiction aléatoire.
 * On peut l'utiliser une fois, puis recharge après une visite à la mine.
 */
class Church extends Building
{
    // État d'utilisation
    private bool $canUse = true;

    // Possibilités de bénédictions , elles sont plus fortes que les malédictions pour encourager à prendre le risque
    private array $blessings = [
        // Pour la force
        [
            'name' => 'Bénédiction de Force',
            'description' => 'Augmente vos dégâts de base de 5!',
            'effect' => 'addDamage'
        ],
        // Pour la santé
        [
            'name' => 'Bénédiction de Santé',
            'description' => 'Augmente votre santé maximale de 20!',
            'effect' => 'addHealth'
        ],
        // Pour le mana
        [
            'name' => 'Bénédiction de Sagesse',
            'description' => 'Augmente votre mana maximum de 30!',
            'effect' => 'addMana'
        ],
        // Pour l'or
        [
            'name' => 'Bénédiction de Fortune',
            'description' => 'Vous recevez 100 pièces d\'or!',
            'effect' => 'addGold'
        ]
    ];

    // Possibilités de malédictions , elles sont plus faibles que les bénédictions pour ne pas être trop punitives
    private array $curses = [
        // Pour la force
        [
            'name' => 'Malédiction de Faiblesse',
            'description' => 'Réduisez vos dégâts de base de 3...',
            'effect' => 'removeDamage'
        ],
        // Pour la santé
        [
            'name' => 'Malédiction de Fragilité',
            'description' => 'Réduisez votre santé maximale de 10...',
            'effect' => 'removeHealth'
        ],
        // Pour le mana
        [
            'name' => 'Malédiction de Vide Magique',
            'description' => 'Réduisez votre mana maximum de 20...',
            'effect' => 'removeMana'
        ]
    ];

    public function __construct()
    {
        parent::__construct(
            "Church",
            "Une bénédiction ou une sort ! "
        );
    }

    /**
     * Permet au héros d'entrer dans l'église et de recevoir une bénédiction/malédiction
     */
    public function enter(IHero $hero): void
    {
        echo "\n{$hero->getName()} entre dans l'église sacrée...\n";

        if (!$this->canUse) {
            echo "L'église a déjà bénit/maudit. Revenez après une visite à la mine.\n";
            return;
        }

        // Générer aléatoirement une bénédiction ou une malédiction
        $isBlessedOrCursed = rand(0, 1); // 0 = bénédiction, 1 = malédiction , c'est comme un bool mais en aleatoire 
        //Si c'est 0, on applique une bénédiction, sinon une malédiction
        if ($isBlessedOrCursed === 0) {
            $this->applyBlessing($hero);
        } else {
            $this->applyCurse($hero);
        }

        // Marquer comme utilisée jusqu'à la prochaine visite mine
        $this->canUse = false;
    }

    /**
     * Applique une bénédiction aléatoire
     */
    private function applyBlessing(IHero $hero): void
    {
        // Choisir une bénédiction aléatoire dans la liste
        $blessing = $this->blessings[array_rand($this->blessings)];

        echo " {$blessing['name']} \n";
        echo "{$blessing['description']}\n";

        $this->applyEffect($hero, $blessing['effect'], true);
    }

    /**
     * Applique une malédiction aléatoire
     */
    private function applyCurse(IHero $hero): void
    {
        // Choisir une malédiction aléatoire dans la liste
        $curse = $this->curses[array_rand($this->curses)];

        echo " {$curse['name']} \n";
        echo "{$curse['description']}\n";

        $this->applyEffect($hero, $curse['effect'], false);
    }

    /**
     * Applique l'effet de la bénédiction/malédiction
     */
    private function applyEffect(IHero $hero, string $effect, bool $isBlessing): void
    {
        match($effect) {
            'addDamage' => $this->addBaseDamage($hero, 5),
            'removeDamage' => $this->addBaseDamage($hero, -3),
            'addHealth' => $this->addHealth($hero, 20),
            'removeHealth' => $this->addHealth($hero, -10),
            'addMana' => $this->addMana($hero, 30),
            'removeMana' => $this->addMana($hero, -20),
            'addGold' => $hero->addGold(100),
            default => null,
        };
    }

    /**
     * Augmente les dégâts de base 
     */
    private function addBaseDamage(IHero $hero, int $amount): void
    {
        // Si on utilisait une interface publique, on le ferait autrement
        // Pour l'instant, on affiche juste l'effet
        echo "Modification des dégâts de base: " . ($amount > 0 ? '+' : '') . $amount . "\n";
    }

    /**
     * Augmente la santé maximale
     */
    private function addHealth(IHero $hero, int $amount): void
    {
        echo "Modification de la santé maximale: " . ($amount > 0 ? '+' : '') . $amount . "\n";
    }

    /**
     * Augmente le mana maximum
     */
    private function addMana(IHero $hero, int $amount): void
    {
        echo "Modification du mana maximum: " . ($amount > 0 ? '+' : '') . $amount . "\n";
    }

    /**
     * Recharge la capacité d'utilisation après une visite à la mine
     */
    public function recharge(): void
    {
        $this->canUse = true;
        echo "L'église a repris sa force magique.\n";
    }

    /**
     * Vérifie si on peut encore utiliser l'église
     */
    public function canBeUsed(): bool
    {
        return $this->canUse;
    }
}
