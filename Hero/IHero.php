<?php

/**
 * Interface IHero
 *
 * Définit le contrat commun à tous les héros du jeu.
 * Les implémentations concrètes devront respecter ces méthodes.
 */
interface IHero
{
    /**
     * Retourne le nom du héros.
     */
    public function getName(): string;

    /**
     * Permet au héros de subir des dégâts.
     */
    public function takeDamage(int $damage): void;

    /**
     * Permet au héros d'attaquer un monstre.
     */
    public function attack(IMonster $monster): void;

    /**
     * Indique si le héros est mort.
     */
    public function isDead(): bool;
}

