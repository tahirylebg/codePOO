<?php

/**
 * Interface ISpell
 * 
 * Définit le contrat pour tous les sorts que les héros (notamment les Mages) peuvent lancer.
 */
interface ISpell
{
    /**
     * Retourne le nom du sort
     */
    public function getName(): string;

    /**
     * Retourne la quantité de mana requise pour lancer le sort
     */
    public function getManaCost(): int;

    /**
     * Retourne le niveau minimum requis pour débloquer ce sort
     */
    public function getRequiredLevel(): int;

    /**
     * Lance le sort sur le monstre
     * Retourne true si le sort a été lancé avec succès, false sinon
     */
    public function cast(IMonster $monster): bool;
}
