<?php

//Interface IBuilding
//Définit le comportement commun à tous les bâtiments du jeu.
//Un bâtiment possède un nom, une description, et peut être visité par un héros.

interface IBuilding
{
    // Retourne le nom du bâtiment
    public function getName(): string;

   //Action lorsqu’un héros entre dans le bâtiment
    public function enter(IHero $hero): void;

    // Retourne la description du bâtiment
    public function getDescription(): string;
}
