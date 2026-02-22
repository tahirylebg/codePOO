<?php

/**
 * Classe Cataclysm
 * Sort ultime débloqué au niveau 10
 * Inflige des dégâts massifs à tous les ennemis (ou au monstre en cas de combat solo)
 */
class Cataclysm implements ISpell
{
    private const NAME = "Cataclysm";
    private const MANA_COST = 100;
    private const REQUIRED_LEVEL = 10;
    private const DAMAGE = 150;

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

    // Inflige des dégâts massifs au monstre ciblé
    public function cast(IMonster $monster): bool
    {
        echo "Cataclysm dévaste " . $monster->getName() . " !\n";
        $monster->takeDamage(self::DAMAGE);
        return true;
    }
}
