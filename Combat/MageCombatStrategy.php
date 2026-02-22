<?php

/**
 * Classe MageCombatStrategy
 * Stratégie de combat spécifique pour les mages, avec une chance d'esquive.
 */
class MageCombatStrategy implements ICombatStrategy
{
    // Chance d'esquive de 20%
    private const DODGE_CHANCE = 0.2;

    // Calcule les dégâts finaux en fonction des dégâts de base et de l'arme équipée
    public function calculateDamage(int $baseDamage, ?IWeapon $weapon): int
    {
        $damage = $baseDamage;

        if ($weapon) {
            $damage += $weapon->getDamage();
        }

        return $damage;
    }

    // Indique si le héros esquive l'attaque en fonction de la chance d'esquive
    public function shouldDodge(): bool
    {
        return mt_rand() / mt_getrandmax() < self::DODGE_CHANCE;
    }
}
