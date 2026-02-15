<?php

/**
 * Classe Sword
 * Représente une épée dans le jeu.
 * Cette classe étend AWeapon, héritant de ses propriétés et méthodes,
 * et fournit une implémentation spécifique pour une épée avec des dégâts de 20 et un prix de 100 pièces d'or.
 * Elle peut être utilisée par les personnages pour infliger des dégâts aux ennemis.
 */

class Sword extends AWeapon
{
    public function __construct()
    {
        parent::__construct("Sword", 20, 100);
    }
}