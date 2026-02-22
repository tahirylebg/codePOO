<?php

/**
 * Classe DeepTerror
 * Monstre de mine niveau 10
 * Puissant avec beaucoup de santé et dégâts élevés
 */
class DeepTerror extends AMonster
{
    public function __construct(int $level = 10)
    {
        // Stats élevées pour le niveau 10
        $health = 80 + (15 * $level);
        $damage = 20 + (4 * $level);
        $xpReward = 100 * $level;
        
        parent::__construct("DeepTerror", $health, $damage, $xpReward);
    }
}
