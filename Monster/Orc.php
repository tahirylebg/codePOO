<?php
/**
 * Classe Orc
 * Monstre de mine niveau 5
 * Monstre de difficulté moyenne avec une santé et des dégâts modérés
 */

class Orc extends AMonster
{
    public function __construct(int $level)
    {
        parent::__construct("Orc",60 * $level,10 * $level,20 * $level);
    }
}
