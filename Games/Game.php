<?php

class Game
{
    private ?IHero $hero;     // Héros du joueur
    private Village $village; // Village contenant les bâtiments
    private bool $isRunning;  // Indique si le jeu continue

    public function __construct()
    {
        $this->hero = null;
        $this->village = new Village();
        $this->isRunning = false;

        // Ajouter les bâtiments au village
        $this->village->addBuilding(new Inn());
        $this->village->addBuilding(new Mine());
        $this->village->addBuilding(new Merchant());
    }

    /**
     * Lance le jeu
     */
    public function start(): void
    {
        echo "============================\n";
        echo "   Bienvenue dans le RPG   \n";
        echo "============================\n\n";

        $this->chooseHeroClass(); // Permet au joueur de choisir sa classe de héros

        $this->isRunning = true; // Démarre la boucle principale du jeu

        $this->gameLoop(); // Lance la boucle principale du jeu
    }

    /**
     * Permet au joueur de choisir sa classe
     */
    public function chooseHeroClass(): void
    {
        echo "Choisissez votre classe :\n";
        echo "1. Warrior\n";
        echo "2. Mage\n";
        echo "3. Paladin\n";

        $choice = readline("Votre choix : ");
        $name = readline("Nom de votre héros : ");

        switch ((int)$choice) {
            case 1:
                $this->hero = new Warrior($name);
                break;
            case 2:
                $this->hero = new Mage($name);
                break;
            case 3:
                $this->hero = new Paladin($name);
                break;
            default:
                echo "Choix invalide. Warrior sélectionné par défaut.\n";
                $this->hero = new Warrior($name);
        }

        echo "\nBienvenue {$this->hero->getName()} !\n";
    }

    /**
     * Boucle principale du jeu
     */
    public function gameLoop(): void
    {
        while ($this->isRunning && !$this->isGameOver()) {

            $this->displayMenu();

            $choice = readline("Choix : ");

            switch ((int)$choice) {

                case 1:
                    $this->enterVillage();
                    break;

                case 2:
                    $this->displayHeroStatus();
                    break;

                case 0:
                    $this->isRunning = false;
                    break;

                default:
                    echo "Choix invalide.\n";
            }
        }

        echo "\nFin du jeu.\n";
    }

    /**
     * Affiche le menu principal
     */
    public function displayMenu(): void
    {
        echo "\n====== MENU ======\n";
        echo "1. Aller au village\n";
        echo "2. Voir statut héros\n";
        echo "0. Quitter\n";
    }

    /**
     * Permet d’entrer dans les bâtiments du village
     */
    private function enterVillage(): void
    {
        echo "\n--- Village ---\n";

        $buildings = $this->village->getBuilding();

        foreach ($buildings as $index => $building) {
            echo ($index + 1) . ". " . $building->getName() . "\n";
        }

        $choice = readline("Choisissez un bâtiment : ");

        $index = (int)$choice - 1;

        if (isset($buildings[$index])) {
            $buildings[$index]->enter($this->hero);
        } else {
            echo "Bâtiment invalide.\n";
        }
    }

    /**
     * Affiche les informations du héros
     */
    private function displayHeroStatus(): void
    {
        echo "\n--- Statut du héros ---\n";
        echo "Nom : " . $this->hero->getName() . "\n";
        echo "En vie : " . ($this->hero->isDead() ? "Non" : "Oui") . "\n";
    }

    /**
     * Vérifie si la partie est terminée
     */
    public function isGameOver(): bool
    {
        if ($this->hero === null) {
            return true;
        }

        if ($this->hero->isDead()) {
            echo "\nVotre héros est mort...\n";
            return true;
        }

        return false;
    }
}
