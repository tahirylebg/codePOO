<?php

/**
 * Classe Paladin
 *
 * Représente un héros de type Paladin dans le jeu.
 * Le Paladin est un combattant polyvalent, capable d'utiliser des épées et des boucliers.
 * Il a une santé élevée et des dégâts modérés, ce qui en fait un héros robuste pour les combats rapprochés.
 * Cette classe hérite de AHero et implémente les méthodes spécifiques pour déterminer les armes et boucliers que le Paladin peut équiper.
 */
class Paladin extends AHero
{
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

}
