<?php
/**
 * Classe PaladinCombatStrategy
 * Stratégie de combat spécifique pour les paladins, sans bonus ni malus de dégâts.
 */

class PaladinCombatStrategy implements ICombatStrategy
{
    // Calcule les dégâts finaux en fonction des dégâts de base et de l'arme équipée
    public function calculateDamage(int $baseDamage, ?IWeapon $weapon): int
    {
        $damage = $baseDamage;

        // Si une arme est équipée, ajoute ses dégâts au total
        if ($weapon) {
            $damage += $weapon->getDamage();
        }

        return $damage;
    }
    //  Indique que les paladins ne peuvent pas esquiver les attaques
    public function shouldDodge(): bool
    {
        return false;
    }
}
