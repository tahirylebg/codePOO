<?php

/**
 * Classe InputHandler
 * Gère les entrées utilisateur en ligne de commande.
 * Hérite de Mine .
 */
class InputHandler extends Mine
{
    // Le constructeur de InputHandler doit appeler le constructeur de Mine
    public function __construct(int $level, IDifficultyStrategy $difficultyStrategy)
    {
        parent::__construct($level, $difficultyStrategy);
    }

    // Demande une entrée de type string à l'utilisateur
    public function getStringInput(string $message): string
    {
        echo $message . " ";
        return trim(fgets(STDIN));
    }

    // Demande une entrée de type int à l'utilisateur, avec validation
    public function getIntInput(string $message, int $min, int $max): int
    {
        do {
            // Affiche le message avec les limites de validité
            echo $message . " ($min - $max) : ";
            $input = trim(fgets(STDIN)); // Lit l'entrée de l'utilisateur et supprime les espaces , fgets sert à lire une ligne de texte depuis l'entrée standard (STDIN) , trim supprime les espaces en début et fin de chaîne
            if (is_numeric($input)) {
                $value = (int)$input;
                if ($value >= $min && $value <= $max) {
                    return $value;
                }
            }

            echo " Entrée invalide, recommence.\n"; // Affiche un message d'erreur si l'entrée n'est pas un nombre ou est hors des limites

        } while (true); // Continue à demander une entrée jusqu'à ce qu'une entrée valide soit fournie
    }

    public function waitForEnter(): void
    {
        // Attend que l'utilisateur appuie sur Entrée pour continuer
        echo "Appuyez sur Entrée pour continuer...";
        fgets(STDIN);
    }
}
