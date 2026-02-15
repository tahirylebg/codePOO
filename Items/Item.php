<?php

/**
 * Interface Item
 *
 * Représente un objet achetable ou utilisable dans le jeu.
 * Tous les objets (armes, boucliers, potions)
 * doivent implémenter cette interface.
 */

interface Item
{
     /**
     * Retourne le nom de l'objet.
     *
     * @return string
     */
    public function getName(): string;

    /**
    * Retourne le prix de l'objet en pièces d'or.
    *
    * @return int
    */
    public function getPrice(): int;
}
