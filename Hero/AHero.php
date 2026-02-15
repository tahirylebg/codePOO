<?php

/**
 * Classe Hero
 * Représente un héros dans le jeu.
 * Cette classe est abstraite et implémente l'interface IHero, définissant les propriétés et méthodes communes à tous les héros.
 * Les héros ont des caractéristiques telles que la santé, les dégâts de base, et peuvent équiper des armes et des boucliers pour améliorer leurs capacités de combat.
 * Ils peuvent également utiliser différentes stratégies de combat pour attaquer les monstres.
 * Le héros peut également gérer son inventaire, accumuler de l'or, et se soigner.
 * Cette classe sert de base pour des types de héros spécifiques (guerrier, mage, etc.) qui peuvent étendre cette classe et ajouter des fonctionnalités uniques.
 */

abstract class AHero implements IHero
{
    protected string $name; //Héros ont un nom pour les identifier dans le jeu
    protected int $health; // Points de vie actuels du héros
    protected int $maxHealth; // Points de vie maximum du héros, déterminant sa capacité à survivre aux combats
    protected int $gold; // Quantité d'or que le héros possède, utilisée pour acheter des équipements et des potions dans le jeu
    protected int $baseDamage; // Dégâts de base du héros, qui peuvent être augmentés en équipant des armes ou en utilisant des stratégies de combat

    protected ?Inventory $inventory; // L'inventaire du héros, permettant de stocker des objets tels que des potions de soin, des armes, et d'autres équipements
    protected ?IWeapon $weapon; // Arme actuellement équipée par le héros, qui peut augmenter les dégâts infligés lors des attaques
    protected ?Shield $shield; // Bouclier actuellement équipé par le héros, qui peut réduire les dégâts subis lors des attaques ennemies
    protected ?ICombatStrategy $strategy; // Stratégie de combat utilisée par le héros pour calculer les dégâts infligés lors des attaques, permettant une personnalisation du style de combat du héros

    /**
     * Constructeur conforme UML
     */
    public function __construct(string $name,int $health,int $maxHealth,int $baseDamage) {
        $this->name = $name;
        $this->health = $health;
        $this->maxHealth = $maxHealth;
        $this->baseDamage = $baseDamage;
        $this->gold = 0;

        $this->inventory = new Inventory();
        $this->weapon = null;
        $this->shield = null;
        $this->strategy = null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Attaque un monstre en utilisant la stratégie
     */
    public function attack(IMonster $monster): void
    {
        if (!$this->strategy) {
            return;
        }

        $damage = $this->strategy->calculateDamage(
            $this->baseDamage,
            $this->weapon
        );

        $monster->takeDamage($damage);
    }

    /**
     * Reçoit des dégâts
     */
    public function takeDamage(int $damage): void
    {

        if ($this->shield) {
            $damage -= $this->shield->getProtection();
        }
        // S'assurer que les dégâts ne sont pas négatifs après la réduction du bouclier
        if ($damage < 0) {
            $damage = 0;
        }

        $this->health -= $damage;
    }


    // Vérifie si le héros est mort (santé inférieure ou égale à zéro)
    public function isDead(): bool
    {
        return $this->health <= 0;
    }



    /*
       Méthodes utilitaires
    */

    // Permet au héros de se soigner en augmentant sa santé, sans dépasser sa santé maximale
    public function heal(int $amount): void{
        $this->health += $amount;

        if ($this->health > $this->maxHealth) {
            $this->health = $this->maxHealth;}
        }

    // Permet au héros d'ajouter de l'or à sa réserve . 
    public function addGold(int $amount): void
    {
        $this->gold += $amount;
    }

    // Permet au héros de dépenser de l'or pour acheter des objets ou des équipements, en vérifiant s'il a suffisamment d'or avant de procéder à la dépense
    public function spendGold(int $amount): bool
    {
        if ($this->gold >= $amount) {
            $this->gold -= $amount;
            return true;
        }
        return false;
    }

    // Permet au héros d'équiper une arme, ce qui peut augmenter ses dégâts lors des attaques
    public function equipWeapon(IWeapon $weapon): void{
        $this->weapon = $weapon;
    }

    // Permet au héros d'équiper un bouclier, ce qui peut réduire les dégâts subis lors des attaques ennemies
    public function equipShield(Shield $shield): void
    {
        $this->shield = $shield;
    }

    // Permet au héros de changer sa stratégie de combat, ce qui peut influencer les dégâts infligés lors des attaques
    public function setStrategy(ICombatStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    // Permet au héros d'accéder à son inventaire pour gérer les objets qu'il possède.
    public function getInventory(): Inventory
    {
        return $this->inventory;
    }
}
