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
     * Retourne le niveau du héros.
     */
    public function getLevel(): int;

    /**
     * Gagne de l'expérience
     */
    public function gainXp(int $xp): void;

    /**
     * Augmente le niveau du héros
     */
    public function levelUp(): void;

    /**
     * Permet au héros de subir des dégâts.
     */
    public function takeDamage(int $damage): void;

    /**
     * Permet au héros d'attaquer un monstre et retourne les dégâts infligés.
     */
    public function attack(IMonster $monster): int;

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

    /**
     * Permet au héros de se soigner en augmentant sa santé
     */
    public function heal(int $amount): void;

    /**
     * Permet au héros d'utiliser une potion
     */
    public function usePotion(): void;

    /**
     * Permet au héros de lancer un sort
     */
    public function useSpell(): void;

    /**
     * Permet au héros de gérer son inventaire
     */
    public function getInventory(): Inventory;

    /**
     * Retourne la santé actuelle du héros.
     */
    public function getHealth(): int;

    /**
     * Retourne la santé maximale du héros.
     */
    public function getMaxHealth(): int;

    /**
     * Retourne le mana actuel du héros.
     */
    public function getMana(): int;

    /**
     * Retourne le mana maximum du héros.
     */
    public function getMaxMana(): int;

    /**
     * Retourne l'or possédé par le héros.
     */
    public function getGold(): int;

    /**
     * Retourne les dégâts de base du héros.
     */
    public function getBaseDamage(): int;

    /**
     * Restaure le mana du héros.
     */
    public function restoreMana(int $amount): void;

    /**
     * Consomme du mana. Retourne true si suffisant, false sinon.
     */
    public function consumeMana(int $amount): bool;
}

