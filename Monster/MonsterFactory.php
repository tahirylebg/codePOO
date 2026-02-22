<?php

/**
 * Classe MonsterFactory
 *
 * Cette classe est responsable de la création de monstres en fonction du niveau de la mine.
 * Elle utilise des règles simples pour déterminer quel type de monstre créer :
 * - niveau >= 20 → FinalBoss
 * - niveau >= 10 → DeepTerror
 * - niveau >= 5 → Zombie
 * - sinon → Spider
 *
 * La méthode createRandomMonster() est une interface publique qui peut être utilisée pour obtenir un monstre aléatoire basé sur le niveau.
 */

class MonsterFactory
{
    /**
     * Crée un monstre en fonction du niveau de la mine
     * Règles :
     * - niveau >= 20 → FinalBoss
     * - niveau >= 10 → DeepTerror
     * - niveau >= 5 → Zombie
     * - sinon → Spider
     */
    public function createMonster(int $mineLevel): IMonster
    {
        if ($mineLevel >= 20) {
            return new FinalBoss($mineLevel);
        } elseif ($mineLevel >= 10) {
            return new DeepTerror($mineLevel);
        } elseif ($mineLevel >= 5) {
            return new Zombie($mineLevel);
        } else {
            return new Spider($mineLevel);
        }
    }

    /**
     * Crée un monstre selon les règles de niveau (version fonctionnelle)
     */
    public function createRandomMonster(int $level): IMonster
    {
        return $this->createMonster($level);
    }
}
