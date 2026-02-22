<?php

/**
 * Classe Zombie
 * Monstre de mine niveau 5
 * Modéré avec bonne santé
 */
class Zombie extends AMonster
{
    public function __construct(int $level = 5)
    {
        // Stats modérées pour le niveau 5
        $health = 40 + (10 * $level);
        $damage = 8 + (2 * $level);
        $xpReward = 30 * $level;
        
        parent::__construct("Zombie", $health, $damage, $xpReward);
    }
}
