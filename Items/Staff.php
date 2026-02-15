<?php
/**
 * Classe Staff
 * Représente un bâton dans le jeu.
 * Cette classe étend AWeapon, héritant de ses propriétés et méthodes,
 * et fournit une implémentation spécifique pour un bâton avec des dégâts de 25 et un prix de 120 pièces d'or.
 * Elle peut être utilisée par les personnages pour infliger des dégâts magiques aux ennemis.
 */

class Staff extends AbstractWeapon implements IWeapon
{
    public function __construct()
    {
        parent::__construct("Staff", 25, 120);
    }
}
