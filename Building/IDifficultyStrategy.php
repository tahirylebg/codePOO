<?php

/**
 * Interface DifficultyStrategy
 *
 * Définit la stratégie permettant de déterminer
 * le nombre de monstres en fonction du niveau.
 */
interface IDifficultyStrategy
{
    /**
     * Retourne le nombre de monstres à générer
     * pour un niveau donné.
     */
    public function getMonsterCount(int $level): int;
}
