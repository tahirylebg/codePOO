<?php

/*
 * Interface ICombatStrategy
 *
 * Définit les méthodes nécessaires pour calculer les dégâts et les chances d'esquive
 * en fonction de la stratégie de combat choisie.
 */

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
