<?php

/**
 * Classe Mine
 *
 * Représente une mine dans le jeu.
 * La mine génère des monstres en fonction de son niveau et de la stratégie
 * de difficulté utilisée (ex : Fibonacci).
 * Le héros peut entrer dans la mine et affronter les monstres générés.
 */
class Mine extends Building
{
    // Niveau actuel de la mine (augmente après chaque victoire)
    private int $level;

    // Liste des monstres générés pour le combat
    private array $monsters;

    // Factory utilisée pour créer les monstres
    private MonsterFactory $factory;

    // Stratégie utilisée pour déterminer le nombre de monstres
    private IDifficultyStrategy $difficultyStrategy;

    /**
     * Constructeur de la mine
     * Initialise le niveau à 1, crée une instance de la factory de monstres,
     * et définit la stratégie de difficulté (ex : Fibonacci). 
     */
    public function __construct()
    {
    parent::__construct("Mine", "Une mine remplie de monstres dangereux.");

    $this->level = 1;
    $this->difficultyStrategy = new FibonacciDifficulty();
    $this->factory = new MonsterFactory();
    $this->monsters = [];
    }


    /**
     * Permet au héros d'entrer dans la mine.
     * Génère les monstres puis lance le combat.
     */
    public function enter(IHero $hero): void
    {
        // Génération des monstres selon le niveau actuel
        $this->generateMonster();

        // Création du système de combat
        $combat = new CombatSystem();

        // Lancement du combat
        $win = $combat->startCombat($hero, $this->monsters);

        // Gestion du résultat du combat
        if ($win) {
            echo "Félicitations ! Vous avez vaincu la mine de niveau {$this->level}.\n";
            $this->level++; // Augmente le niveau pour la prochaine entrée
        } else {
            echo "Vous avez été vaincu dans la mine de niveau {$this->level}.\n";
        }
    }

    /**
     * Génère les monstres en fonction du niveau actuel de la mine.
     * Le nombre de monstres est déterminé par la stratégie de difficulté
     * (ex : suite de Fibonacci).
     */
    public function generateMonster(): void
    {
        echo "Génération des monstres pour la mine de niveau {$this->level}...\n";

        // Détermine combien de monstres doivent être générés
        $monsterCount = $this->difficultyStrategy->getMonsterCount($this->level);

        // Réinitialise la liste des monstres
        $this->monsters = [];

        // Génère les monstres via la factory
        for ($i = 0; $i < $monsterCount; $i++) {
            $this->monsters[] = $this->factory->createRandomMonster($this->level);
        }
    }
}
