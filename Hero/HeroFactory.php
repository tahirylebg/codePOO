<?php

/**
 * Classe HeroFactory
 *
 * Responsable de la création de héros selon leur type.
 * Instancie directement les classes concrètes (Warrior, Mage, Paladin)
 * et les configure avec leurs équipements par défaut.
 *
 * Types supportés : "warrior", "mage", "paladin"
 */
class HeroFactory
{
    /**
     * Crée et retourne un héros selon son nom et son type.
     *
     * @param string $name Le nom du héros
     * @param string $type Le type du héros ("warrior", "mage", "paladin")
     * @return IHero Le héros instancié et configuré
     * @throws InvalidArgumentException Si le type de héros est inconnu
     */
    public static function createHero(string $name, string $type): IHero
    {
        switch (strtolower($type)) {

            case 'warrior':
                // Guerrier : 120 PV, dégâts élevés avec bonus x1.5, épée uniquement, pas de bouclier
                $hero = new Warrior($name);
                $hero->equipWeapon(new Sword());
                return $hero;

            case 'mage':
                // Mage : 80 PV, dégâts magiques élevés, 20% d'esquive, bâton uniquement, pas de bouclier
                $hero = new Mage($name);
                $hero->equipWeapon(new Staff());
                return $hero;

            case 'paladin':
                // Paladin : 100 PV, dégâts modérés, épée + bouclier
                $hero = new Paladin($name);
                $hero->equipWeapon(new Sword());
                $hero->equipShield(new Shield("Bouclier du Paladin", 5, 80));
                return $hero;

            default:
                throw new InvalidArgumentException(
                    "Type de héros inconnu : \"" . $type . "\". Types acceptés : warrior, mage, paladin."
                );
        }
    }
}