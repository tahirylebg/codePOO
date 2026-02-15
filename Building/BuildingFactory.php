<?php

/**
 * Classe BuildingFactory
 *
 * Responsable de la création des bâtiments du village.
 * Utilise le pattern Factory pour centraliser l'instanciation des bâtiments
 * et découpler leur création du reste du code.
 */
class BuildingFactory
{
    // Types de bâtiments disponibles
    public const TYPE_INN  = 'inn';
    public const TYPE_MINE = 'mine';

    /**
     * Crée un bâtiment selon le type demandé.
     *
     * @param string $type               L
     * @param array  $options
     *
     * @return IBuilding
     * @throws InvalidArgumentException  Si le type de bâtiment est inconnu
     */
    public function create(string $type, array $options = []): IBuilding
    {
        $type = strtolower($type);

        if ($type === self::TYPE_INN) {
            return $this->createInn($options);
        }

        if ($type === self::TYPE_MINE) {
            return $this->createMine($options);
        }

        throw new InvalidArgumentException(
            "Type de bâtiment inconnu : '$type'. "
            . "Types disponibles : " . implode(', ', [self::TYPE_INN, self::TYPE_MINE])
        );
    }

    // Crée une auberge avec les coûts de guérison et les montants de guérison fournis, ou des valeurs par défaut.
    private function createInn(array $options): Inn
    {
        $healingCost   = $options['healingCost']   ?? 10;
        $healingAmount = $options['healingAmount']  ?? 50;

        return new Inn($healingCost, $healingAmount);
    }

    // Crée une mine avec le niveau et la stratégie de difficulté fournis, ou des valeurs par défaut.
    private function createMine(array $options): Mine
    {
        $level    = $options['level']             ?? 1;
        $strategy = $options['difficultyStrategy'] ?? new FibonacciDifficulty();

        return new Mine($level, $strategy);
    }
}