<?php
/**
 * Classe UndeadCombatStrategy
 * Stratégie de combat spécifique pour les héros combattant des morts-vivants, avec un malus de dégâts.
 */
class UndeadCombatStrategy implements ICombatStrategy
{
    private const DAMAGE_PENALTY = 0.8; // -20% de dégâts

    // Calcule les dégâts finaux en fonction des dégâts de base et de l'arme équipée, en appliquant le malus de dégâts
    public function calculateDamage(int $baseDamage, ?IWeapon $weapon): int
    {
        $damage = $baseDamage;
        // Si une arme est équipée, ajoute ses dégâts au total
        if ($weapon) {
            $damage += $weapon->getDamage();
        }

        // Appliquer le malus de dégâts
        return (int)($damage * self::DAMAGE_PENALTY);
    }

    // Indique que les héros combattant des morts-vivants ne peuvent pas esquiver les attaques
    public function shouldDodge(): bool
    {
        return false;
    }
}
