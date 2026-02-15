
<?php
/**
 * Interface Weapon
 *
 * Représente une arme dans le jeu.
 * Les armes doivent implémenter cette interface
 * pour être utilisées par les personnages.
 */

interface IWeapon {
    /** 
     * Retourne le nom de l'arme.
     * @return string
     */
    public function getName(): string;
    /**
    * Retourne les dégâts infligés par l'arme.
    * @return int
    */
    public function getDamage(): int;
    /**
     * Retourne le prix de l'arme en pièces d'or.
     * @return int
     */
    public function getPrice(): int;
}
