<?php

/**
 * Classe Warrior
 *
 * Représente un héros de type Guerrier dans le jeu.
 * Le Guerrier est un combattant spécialisé dans les attaques physiques, avec une santé élevée et des dégâts importants.
 * Il peut équiper des épées pour augmenter ses dégâts, mais ne peut pas utiliser de boucliers.
 * Cette classe hérite de AHero et implémente les méthodes spécifiques pour déterminer les armes que le Guerrier peut équiper.
 */
class Warrior extends AHero {

    private const DAMAGE_BONUS = 1.5;

    public function __construct(string $name)
        {
            parent::__construct($name, 120 , 120 , 20);
        }

    public function attack(IMonster $monster): void
    {
        // Calcul des dégâts en fonction de l'arme équipée et de la stratégie de combat
        $damage = (int)($this->baseDamage);

        // Si une arme est équipée, ajouter ses dégâts au total
        if ($this->weapon) {
            $damage = $damage + $this->weapon->getDamage();
        }
        // Appliquer la stratégie de combat pour calculer les dégâts finaux
        $damage = $damage * self::DAMAGE_BONUS;

        $monster->takeDamage((int)$damage);
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
}