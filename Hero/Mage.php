<?php

/**
 * Classe Mage
 *
 * Représente un héros de type Mage dans le jeu.
 * Le Mage est un utilisateur de magie, spécialisé dans les attaques à distance et les sorts puissants.
 * Il a une santé plus faible que le guerrier ou le paladin, mais compense cela par des dégâts magiques élevés.
 * Cette classe hérite de AHero et implémente les méthodes spécifiques pour déterminer les armes que le Mage peut équiper (bâtons) et son incapacité à équiper des boucliers.
 */
class Mage extends AHero{

    private const DODGE_CHANCE = 0.2;

    public function __construct(string $name){
        parent::__construct($name, 80, 80, 25); // Les mages ont une santé de base de 80 et une santé maximale de 100

        $this->setStrategy(new MageCombatStrategy()); // Le mage utilise une stratégie de combat spécifique pour les attaques magiques
    }

    public function takeDamage(int $damage): void {
        $random = mt_rand() / mt_getrandmax(); // Génère un nombre aléatoire entre 0 et 1
        if ($random <= self::DODGE_CHANCE) {
            // Le mage esquive l'attaque
            echo $this->name . " esquive l'attaque !\n";
        } else {
            parent::takeDamage($damage);
        }
    }

    public function canEquipWeapon(IWeapon $weapon): bool{
        // Les mages peuvent équiper des bâtons , mais pas des épées
        return $weapon instanceof Staff ;
    }

    public function canEquipShield(): bool{
        // Les mages ne peuvent pas équiper de boucliers comme le guerrier contrairement au Paladin, donc cette méthode retourne false
        return false;
    }
}