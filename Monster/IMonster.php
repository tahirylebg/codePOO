<?php

/**
 * Interface IMonster
 *
 * Définit le contrat commun à tous les monstres du jeu.
 * Les implémentations concrètes devront respecter ces méthodes.
 */

Interface IMonster{

    // Retourne le nom du monstre.
    public function getName(): string;

    // Retourne les points de vie actuels du monstre.
    public function getHealth(): int;

    // Retourne les dégâts que le monstre peut infliger lors d'une attaque.
    public function getDamage(): int;

    // Permet au monstre de subir des dégâts, ce qui peut réduire ses points de vie.
    public function takeDamage(int $damage): void;

    //  Permet au monstre d'attaquer un héros, infligeant des dégâts en fonction de sa propre puissance d'attaque.
    public function attack(IHero $hero): int;

    // Indique si le monstre est mort, c'est-à-dire si ses points de vie sont réduits à zéro ou moins.
    public function isDead(): bool;

    // Retourne la récompense en or que le héros recevra après avoir vaincu ce monstre.
    public function getGoldReward(): int;
}