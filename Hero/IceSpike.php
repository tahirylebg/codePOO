<?php

/**
 * Classe IceSpike
 * Sort débloqué au niveau 3
 * Inflige des dégâts de glace et peut ralentir le monstre
 */
class IceSpike implements ISpell
{
    private const NAME = "IceSpike";
    private const MANA_COST = 30;
    private const REQUIRED_LEVEL = 3;
    private const DAMAGE = 50;

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

    // Inflige des dégâts de glace au monstre ciblé
    public function cast(IMonster $monster): bool
    {
        echo "IceSpike transperce " . $monster->getName() . " !\n";
        $monster->takeDamage(self::DAMAGE);
        return true;
    }
}
