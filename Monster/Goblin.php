<?php
/**
 * Classe Goblin
 * Monstre de mine niveau 1
 * Faible santé et dégâts, mais facile à vaincre pour les débutants
 */

class Goblin extends AMonster
{
    public function __construct(int $level)
    {
        parent::__construct("Goblin",30 * $level,5 * $level,10 * $level);
    }
}
