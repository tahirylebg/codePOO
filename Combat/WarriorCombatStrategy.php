<?php

/**
 * Classe WarriorCombatStrategy
 * Stratégie de combat spécifique pour les guerriers, avec un bonus de dégâts.
 */

class WarriorCombatStrategy implements ICombatStrategy
{
    private const DAMAGE_BONUS = 1.5; // +50% de dégâts
    // Calcule les dégâts finaux en fonction des dégâts de base et de l'arme équipée, en appliquant le bonus de dégâts
    public function calculateDamage(int $baseDamage, ?IWeapon $weapon): int
    {
        $damage = $baseDamage;
        //  Si une arme est équipée, ajoute ses dégâts au total
        if ($weapon) {
            $damage += $weapon->getDamage();
        }

        return (int) ($damage * self::DAMAGE_BONUS);
    }

    //  Indique que les guerriers ne peuvent pas esquiver les attaques
    public function shouldDodge(): bool
    {
        return false;
    }
}
