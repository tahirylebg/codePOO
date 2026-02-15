<?php

class MageCombatStrategy implements ICombatStrategy
{
    private const DODGE_CHANCE = 0.2;

    public function calculateDamage(int $baseDamage, ?IWeapon $weapon): int
    {
        $damage = $baseDamage;

        if ($weapon) {
            $damage += $weapon->getDamage();
        }

        return $damage;
    }

    public function shouldDodge(): bool
    {
        return mt_rand() / mt_getrandmax() < self::DODGE_CHANCE;
    }
}
