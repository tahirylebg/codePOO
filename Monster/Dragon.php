<?php
/**
 * Classe Dragon
 * Monstre de mine niveau 15
 * Très puissant avec une grande santé et des dégâts élevés
 */

class Dragon extends AMonster{
    public function __construct(int $level)
    {
        parent::__construct("Dragon",120 * $level,20 * $level,50 * $level);
    }
}
