<?php

/**
 * Classe FibonacciDifficulty
 *
 * Implémente la stratégie de difficulté en utilisant la séquence de Fibonacci pour déterminer le nombre de monstres à générer en fonction du niveau du héros.
 * Cette classe utilise une instance de FibonacciSequence pour calculer le nombre de monstres à chaque niveau, offrant ainsi une progression de difficulté plus naturelle et équilibrée.
 * En utilisant la séquence de Fibonacci, le nombre de monstres augmente de manière exponentielle, ce qui rend les niveaux plus difficiles à mesure que le héros progresse dans le jeu.
 */

class FibonacciDifficulty implements DifficultyStrategy
{
    // La classe FibonacciDifficulty utilise une séquence de Fibonacci pour déterminer le nombre de monstres à générer en fonction du niveau du héros.
    private FibonacciSequence $sequence;

    // Le constructeur initialise la séquence de Fibonacci, qui sera utilisée pour calculer le nombre de monstres à chaque niveau.
    public function __construct()
    {
        $this->sequence = new FibonacciSequence();
    }
    
    // La méthode getMonsterCount prend un niveau en paramètre et retourne le nombre de monstres à générer pour ce niveau en utilisant la séquence de Fibonacci.
    public function getMonsterCount(int $level): int
    {
        return $this->sequence->getFibonacci($level);
    }
}
