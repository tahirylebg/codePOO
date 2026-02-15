<?php

class HeroBuilder
{
    private string $name; // Nom du héros
    private int $health = 100; // Santé actuelle du héros
    private int $maxHealth = 100; // Santé maximale du héros
    private int $baseDamage = 10; // Dégâts de base du héros sans équipement
    private int $gold = 0; // Quantité d'or que le héros possède

    private ?Inventory $inventory; // Inventaire du héros pour stocker les objets
    private ?IWeapon $weapon; // Arme équipée par le héros
    private ?Shield $shield; // Bouclier équipé par le héros
    private ?ICombatStrategy $strategy; // Stratégie de combat utilisée par le héros

    public function __construct(string $name){
        $this->name = $name;
        $this->inventory = new Inventory();
    }

    /*
    Méthodes de configuration du héros
     */
    public function health(int $health): self{
        $this->health = $health;
        return $this;
    }


    /*    Méthodes de configuration du héros
     */
    public function maxHealth(int $maxHealth): self{
        $this->maxHealth = $maxHealth;
        return $this;
    }

    public function gold(int $gold): self{
        $this->gold = $gold;
        return $this;
    }

    public function baseDamage(int $baseDamage): self{
        $this->baseDamage = $baseDamage;
        return $this;
    }

    public function weapon(IWeapon $weapon): self{
        $this->weapon = $weapon;
        return $this;
    }

    public function shield(Shield $shield): self{
        $this->shield = $shield;
        return $this;
    }

    public function strategy(ICombatStrategy $strategy): self{
        $this->strategy = $strategy;
        return $this;
    }

    // Méthode pour construire le héros avec les configurations spécifiées

    public function build(): Hero{
        // Vérification que les propriétés essentielles sont définies avant de construire le héros
        if ($this->strategy === null) {
            throw new Exception("Strategy must be defined.");
        }

        // Ici on peut instancier un Hero concret
        // On suppose qu'on reçoit une classe concrète plus tard
        $hero = new class(
            $this->name,
            $this->health,
            $this->maxHealth,
            $this->baseDamage
        ) extends Hero {};

        // Transférer les propriétés supplémentaires au héros construit
        $hero->addGold($this->gold);

        // Équiper le héros avec l'arme, le bouclier et la stratégie spécifiés dans le builder
        if ($this->weapon !== null) {
            $hero->equipWeapon($this->weapon);
        }

        // Équiper le héros avec le bouclier s'il est défini, ce qui peut réduire les dégâts subis lors des attaques ennemies
        if ($this->shield !== null) {
            $hero->equipShield($this->shield);
        }

        $hero->setStrategy($this->strategy);

        return $hero;
    }


}