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

    public function build(string $heroClass): IHero
    {
        // Vérifie que la classe de héros existe et est valide
        if (!class_exists($heroClass)) {
        throw new Exception("Classe de héros invalide.");
        }

        // Crée une instance du héros en utilisant la classe spécifiée
        $hero = new $heroClass($this->name);

        // Configure les propriétés du héros avec les valeurs spécifiées dans le builder
        $hero->addGold($this->gold);

        // Configure la santé du héros, en s'assurant qu'elle ne dépasse pas la santé maximale
        $hero->setHealth(min($this->health, $this->maxHealth));

        // Configure la santé maximale du héros
        $hero->setMaxHealth($this->maxHealth);

        // Configure les dégâts de base du héros
        $hero->setBaseDamage($this->baseDamage);

        // Configure l'arme du héros si spécifiée
        if ($this->weapon !== null) {
            $hero->equipWeapon($this->weapon);
        }

        // Configure le bouclier du héros si spécifié
        if ($this->shield !== null) {
        $hero->equipShield($this->shield);
        }

        // Configure la stratégie de combat du héros si spécifiée
        if ($this->strategy !== null) {
            $hero->setStrategy($this->strategy);
        }

        return $hero;
    }

}