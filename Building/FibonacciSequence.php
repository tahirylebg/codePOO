<?php

/**
 * Class FibonacciSequence
 *
 * Cette classe génère la séquence de Fibonacci et permet d'obtenir le nombre de monstres à générer pour un niveau donné en utilisant cette séquence.
 * Petit rappel du lycée : Fibonacci est une suite de nombres où chaque nombre est la somme des deux précédents, généralement commencée par 1 et 1.
 * On va utiliser un tableau pour stocker les valeurs déjà calculées de la séquence afin d'optimiser les calculs et éviter les redondances.
 */

class FibonacciSequence {

    private array $fibonacci;

    public function __construct(){
        $this->fibonacci = [1, 1];
    }

    public function getFibonacci(int $level): int {
        // Si le niveau demandé est déjà calculé, on le retourne
        if ($level <= 2) {
            return 1;
        }

        // Si le niveau demandé n'est pas encore calculé, on le calcule
        // count sert à compter le nombre d'éléments dans le tableau, donc count($this->fibonacci) - 1 donne l'index du dernier élément
        while (count($this->fibonacci) < $level) {
            $this->fibonacci[] = $this->fibonacci[count($this->fibonacci) - 1] + $this->fibonacci[count($this->fibonacci) - 2];
        }

        return $this->fibonacci[$level - 1];
    }

}