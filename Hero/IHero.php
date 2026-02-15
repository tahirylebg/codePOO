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
    /**
    * Permet au héros de dépenser de l'or.
    * Retourne true si la transaction a réussi, false sinon.
    */
    public function spendGold(int $amount): bool;

    /**
    * Permet au héros d'ajouter de l'or à sa réserve.
    */
    public function addGold(int $amount): void;

    /*Permet au héros de se soigner en augmentant sa santé, sans dépasser sa santé maximale
    */
    public function heal(int $amount): void;

    // Permet au héros d'équiper une arme, en vérifiant si l'arme est compatible avec le type de héros
    public function getInventory(): Inventory;
}

