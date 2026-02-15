<?php

interface ICombatStrategy
{
    /**
     * Calcule les dégâts finaux en fonction des dégâts de base
     * et de l'arme équipée.
     */
    public function calculateDamage(int $baseDamage, ?IWeapon $weapon): int;

    /**
     * Indique si le héros esquive l'attaque.
     */
    public function shouldDodge(): bool;
}
