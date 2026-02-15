<?php

 //Le village permet au héros d'interagir avec les bâtiments disponibles.
class Village
{
    //Représente un village contenant plusieurs bâtiments
    //Le village permet au héros d'interagir avec les bâtiments disponibles

    /**
     * @var IBuilding[] Liste des bâtiments du village
     */
    //Creation d'un tableau de bâtiments pour stocker les bâtiments du village
    private array $buildings;

    public function __construct()
    {
        $this->buildings = [];
    }

    // Permet d'ajouter un bâtiment au village
    public function addBuilding(IBuilding $building): void
    {
        $this->buildings[] = $building;
    }

    /**
     * @return IBuilding[]
     */
    // retourne la liste des bâtiments du village
    public function getBuilding(): array
    {
        return $this->buildings;
    }

    // Affiche les bâtiments disponibles dans le village
    public function displayBuilding(): void
    {
        echo "Bâtiments disponibles dans le village :\n";

        foreach ($this->buildings as $index => $building) {
            echo ($index + 1) . ". "
                . $building->getName()
                . " — "
                . $building->getDescription()
                . "\n";
        }
    }

    // Permet au héros d'entrer dans un bâtiment spécifique du village avec son nom
    public function enterBuilding(string $buildingName, IHero $hero): void
    {
        foreach ($this->buildings as $building) {
            if ($building->getName() === $buildingName) {
                echo $hero->getName() . " entre dans : " . $buildingName . "\n";
                $building->enter($hero);
                return;
            }
        }

        echo "Le bâtiment '$buildingName' n'existe pas dans le village.\n";
    }
}
