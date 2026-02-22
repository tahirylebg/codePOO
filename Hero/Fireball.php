<?php

/**
 * Classe Fireball
 * Sort basique débloqué au niveau 1
 * Inflige des dégâts de feu au monstre
 */
class Fireball implements ISpell
{
    private const NAME = "Fireball";
    private const MANA_COST = 20;
    private const REQUIRED_LEVEL = 1;
    private const DAMAGE = 30;

    public function getName(): string
    {
        return self::NAME;
    }

    public function getManaCost(): int
    {
        return self::MANA_COST;
    }

    public function getRequiredLevel(): int
    {
        return self::REQUIRED_LEVEL;
    }

    // Inflige des dégâts de feu au monstre ciblé
    public function cast(IMonster $monster): bool
    {
        echo "Fireball est lancée sur " . $monster->getName() . " !\n";
        $monster->takeDamage(self::DAMAGE);
        return true;
    }
}
