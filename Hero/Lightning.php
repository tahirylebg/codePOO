<?php

/**
 * Classe Lightning
 * Sort débloqué au niveau 5
 * Inflige des dégâts d'électricité importants
 */
class Lightning implements ISpell
{
    private const NAME = "Lightning";
    private const MANA_COST = 40;
    private const REQUIRED_LEVEL = 5;
    private const DAMAGE = 70;

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

    // Inflige des dégâts d'électricité au monstre ciblé
    public function cast(IMonster $monster): bool
    {
        echo "Lightning frappe " . $monster->getName() . " !\n";
        $monster->takeDamage(self::DAMAGE);
        return true;
    }
}
