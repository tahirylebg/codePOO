<?php

/**
 * Classe FinalBoss
 * Monstre de mine niveau 20+
 * Extrêmement puissant - le boss final de la mine
 */
class FinalBoss extends AMonster
{
    public function __construct(int $level = 20)
    {
        // Stats massives pour le boss final
        $health = 150 + (30 * $level);
        $damage = 50 + (8 * $level);
        $xpReward = 500 * $level;
        
        parent::__construct("FinalBoss", $health, $damage, $xpReward);
    }
}
