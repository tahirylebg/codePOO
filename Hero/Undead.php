<?php

/**
 * Classe Undead
 *
 * Représente un héros de type Mort-Vivant dans le jeu.
 * L'Undead a des dégâts réduits (-20%) mais possède une protection spéciale :
 * il survit à la première attaque qui aurait pu être mortelle.
 * Cette classe hérite de AHero et implémente sa stratégie de combat unique.
 */
class Undead extends AHero
{
    // Constante pour le malus de dégâts
    private const DAMAGE_PENALTY = 0.8; // -20% = 80% des dégâts

    // Propriété pour suivre si le héros a déjà utilisé sa protection contre la mort
    private bool $hasDeathProtection = true;

    public function __construct(string $name)
    {
        parent::__construct($name, 110, 110, 16, 100); // Stats équilibrées
        
        $this->setStrategy(new UndeadCombatStrategy());
    }

    /**
     * Attaque avec -20% de dégâts
     */
    public function attack(IMonster $monster): int
    {
        if (!$this->strategy) {
            return 0;
        }

        $damage = $this->strategy->calculateDamage(
            $this->baseDamage,
            $this->weapon
        );

        // Appliquer le malus de dégâts
        $damage = (int)($damage * self::DAMAGE_PENALTY);

        $monster->takeDamage($damage);
        return $damage;
    }

    /**
     * Surcharge takeDamage pour implémenter la protection contre la mort
     */
    public function takeDamage(int $damage): void
    {
        // Appliquer la réduction du bouclier d'abord
        if ($this->shield) {
            $damage -= $this->shield->getProtection();
        }
        
        if ($damage < 0) {
            $damage = 0;
        }

        // Vérifier si le dégât serait mortel et si on a la protection
        if ($this->hasDeathProtection && ($this->health - $damage) <= 0) {
            // Réduire les dégâts pour laisser 1 PV au minimum
            $damage = $this->health - 1;
            $this->hasDeathProtection = false;
            echo "{$this->name} a survécu grâce à sa protection des Morts-Vivants !\n";
        }

        $this->health -= $damage;
    }

    /**
     * Retourne si le héros a encore sa protection contre la mort
     */
    public function hasDeathProtection(): bool
    {
        return $this->hasDeathProtection;
    }

    /**
     * Restaure la protection contre la mort (par exemple après une visite à l'église)
     */
    public function restoreDeathProtection(): void
    {
        $this->hasDeathProtection = true;
        echo "{$this->name} a restauré sa protection des Morts-Vivants.\n";
    }
}
