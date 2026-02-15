<?php

/**
 * Classe InputHandler
 * Gère les entrées utilisateur en ligne de commande.
 * Hérite de Mine (selon la contrainte demandée).
 */
class InputHandler extends Mine
{
    // Le constructeur de InputHandler doit appeler le constructeur de Mine
    public function __construct(int $level, DifficultyStrategy $difficultyStrategy)
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
            echo $message . " ($min - $max) : ";
            $input = trim(fgets(STDIN));

            if (is_numeric($input)) {
                $value = (int)$input;
                if ($value >= $min && $value <= $max) {
                    return $value;
                }
            }

            echo " Entrée invalide, recommence.\n";

        } while (true);
    }

    public function waitForEnter(): void
    {
        // Attend que l'utilisateur appuie sur Entrée pour continuer
        echo "Appuyez sur Entrée pour continuer...";
        fgets(STDIN);
    }
}
