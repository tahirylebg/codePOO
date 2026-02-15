<?php

class PaladinCombatStrategy implements ICombatStrategy
{
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
        return false;
    }
}
