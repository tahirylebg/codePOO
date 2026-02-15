<?php

class WarriorCombatStrategy implements ICombatStrategy
{
    private const DAMAGE_BONUS = 1.5;

    public function calculateDamage(int $baseDamage, ?IWeapon $weapon): int
    {
        $damage = $baseDamage;

        if ($weapon) {
            $damage += $weapon->getDamage();
        }

        return (int) ($damage * self::DAMAGE_BONUS);
    }

    public function shouldDodge(): bool
    {
        return false;
    }
}
