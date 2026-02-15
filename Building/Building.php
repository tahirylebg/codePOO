<?php


//Cette classe sert de base pour des bâtiments concrets comme une boutique, une auberge, une forge, etc.
abstract class Building implements IBuilding
{
    protected string $name;
    protected string $description;
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    // Retourne le nom du bâtiment
    public function getName(): string
    {
        return $this->name;
    }

    // Retourne la description du bâtiment
    public function getDescription(): string
    {
        return $this->description;
    }

    // Action lorsqu’un héros entre dans le bâtiment
    abstract public function enter(IHero $hero): void;
}
