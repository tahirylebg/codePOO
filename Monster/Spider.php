<?php

/**
 * Classe Spider
 * Monstre de mine niveau 1
 * Faible mais rapide
 */
class Spider extends AMonster
{
    public function __construct(int $level = 1)
    {
        // Stats équilibrées pour le niveau 1
        $health = 20 + (5 * $level);
        $damage = 3 + $level;
        $xpReward = 10 * $level;
        
        parent::__construct("Spider", $health, $damage, $xpReward);
    }
}
