<?php

/**
 * Classe Paladin
 *
 * Représente un héros de type Paladin dans le jeu.
 * Le Paladin est un combattant polyvalent, capable d'utiliser des épées et des boucliers.
 * Il a une santé élevée et des dégâts modérés, ce qui en fait un héros robuste pour les combats rapprochés.
 * Capacités spéciales :
 * - Heal Aura (niveau 1) : se soigne automatiquement tous les tours (5 HP)
 * - Invincibility (niveau 5) : ignore la prochaine attaque ennemie
 * Cette classe hérite de AHero et implémente les méthodes spécifiques pour déterminer les armes et boucliers que le Paladin peut équiper.
 */
class Paladin extends AHero
{
    // Constants pour les capacités
    private const HEAL_AURA_AMOUNT = 5; // Soin par tour
    private const HEAL_AURA_UNLOCKED = true; // Débloqué dès le départ (niveau 1)

    // Propriétés pour les capacités
    private bool $invincibilityUnlocked = false; // Débloqué au niveau 5
    private bool $invincibilityActive = false; // Actif pour le prochain coup

    public function __construct(string $name)
    {
        parent::__construct($name, 100, 100, 18); // Les paladins ont une santé de base de 100 et une santé maximale de 100

        $this->setStrategy(new PaladinCombatStrategy()); // Le paladin utilise une stratégie de combat spécifique pour les attaques physiques
    }

    // Les paladins peuvent équiper des épées, donc cette méthode vérifie si l'arme est une épée
    public function canEquipWeapon(IWeapon $weapon): bool
    {
        return $weapon instanceof Sword;
    }

    // Les paladins peuvent équiper des boucliers, donc cette méthode retourne true
    public function canEquipShield(): bool{
        return true;
    }

    /**
     * Applique la Heal Aura du Paladin (soin passif tous les tours)
     */
    public function applyHealAura(): void
    {
        if (self::HEAL_AURA_UNLOCKED) {
            $this->heal(self::HEAL_AURA_AMOUNT);
            echo "{$this->name} utilise Heal Aura et se soigne de " . self::HEAL_AURA_AMOUNT . " HP !\n";
        }
    }

    /**
     * Override de takeDamage pour implémenter l'invincibilité
     */
    public function takeDamage(int $damage): void
    {
        // Vérifier si l'invincibilité est active
        if ($this->invincibilityActive && $this->invincibilityUnlocked) {
            echo "{$this->name} utilise son invincibilité et ignore l'attaque !\n";
            $this->invincibilityActive = false;
            return;
        }

        // Sinon, appliquer les dégâts normalement
        parent::takeDamage($damage);
    }

    /**
     * Permet d'activer manuellement l'invincibilité
     */
    public function activateInvincibility(): void
    {
        if ($this->invincibilityUnlocked) {
            $this->invincibilityActive = true;
            echo "{$this->name} se prépare à utiliser son invincibilité !\n";
        } else {
            echo "{$this->name} n'a pas encore débloqué l'invincibilité (niveau 5 requis).\n";
        }
    }

    /**
     * Vérifie si l'invincibilité est débloquée
     */
    public function isInvincibilityUnlocked(): bool
    {
        return $this->invincibilityUnlocked;
    }

    /**
     * Override de levelUp pour débloquer l'invincibilité
     */
    public function levelUp(): void
    {
        parent::levelUp();

        // Au niveau 5, déverrouille l'invincibilité
        if ($this->level >= 5 && !$this->invincibilityUnlocked) {
            $this->invincibilityUnlocked = true;
            echo "{$this->name} a débloqué l'invincibilité !\n";
        }
    }
}
