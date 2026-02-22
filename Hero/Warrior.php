<?php

/**
 * Classe Warrior
 *
 * Représente un héros de type Guerrier dans le jeu.
 * Le Guerrier est un combattant spécialisé dans les attaques physiques, avec une santé élevée et des dégâts importants.
 * Il peut équiper des épées pour augmenter ses dégâts, mais ne peut pas utiliser de boucliers.
 * Au niveau 5, le Guerrier débloque Berserk : +25% dégâts sur la prochaine attaque.
 * Cette classe hérite de AHero et implémente les méthodes spécifiques pour déterminer les armes que le Guerrier peut équiper.
 */
class Warrior extends AHero {

    private const DAMAGE_BONUS = 1.5;
    private const BERSERK_BONUS = 1.25; // +25% dégâts avec Berserk

    private bool $berserkUnlocked = false; // Débloqué au niveau 5
    private bool $berserkActive = false; // Actif pour la prochaine attaque

    public function __construct(string $name)
        {
            parent::__construct($name, 120 , 120 , 20);

            $this->setStrategy(new WarriorCombatStrategy());
        }

    public function attack(IMonster $monster): int
    {
        // Calcul des dégâts en fonction de l'arme équipée et de la stratégie de combat
        $damage = (int)($this->baseDamage);

        // Si une arme est équipée, ajouter ses dégâts au total
        if ($this->weapon) {
            $damage = $damage + $this->weapon->getDamage();
        }
        // Appliquer la stratégie de combat pour calculer les dégâts finaux
        $damage = (int)($damage * self::DAMAGE_BONUS);

        // Appliquer Berserk si actif
        if ($this->berserkActive && $this->berserkUnlocked) {
            $damage = (int)($damage * self::BERSERK_BONUS);
            echo "{$this->name} utilise Berserk ! +25% dégâts !\n";
            $this->berserkActive = false; // Berserk se désactive après utilisation
        }

        $monster->takeDamage($damage);
        return $damage;
    }

    public function canEquipWeapon(IWeapon $weapon): bool
    {
        // instanceOf : vérifie si l'arme est une épée, les guerriers ne peuvent équiper que des épées
        return $weapon instanceof Sword; 
    }

    // Les guerriers ne peuvent pas équiper de boucliers contrairement au Paladin, donc cette méthode retourne toujours false
    public function canEquipShield(): bool
    {
        return false;
    }

    /**
     * Override de levelUp pour activer Berserk au niveau 5
     */
    public function levelUp(): void
    {
        parent::levelUp();

        // Au niveau 5, déverrouille Berserk
        if ($this->level >= 5 && !$this->berserkUnlocked) {
            $this->berserkUnlocked = true;
            echo "{$this->name} a débloqué Berserk !\n";
        }
    }

    /**
     * Active Berserk pour le prochain coup
     */
    public function activateBerserk(): void
    {
        if ($this->berserkUnlocked) {
            $this->berserkActive = true;
            echo "{$this->name} se prépare à utiliser Berserk !\n";
        } else {
            echo "{$this->name} n'a pas encore débloqué Berserk (niveau 5 requis).\n";
        }
    }

    /**
     * Vérifie si Berserk est débloqué
     */
    public function isBerserkUnlocked(): bool
    {
        return $this->berserkUnlocked;
    }
}