<?php

class Mine extends Building{
    private int $level;
    private array $monsters;
    private MonsterFactory $factory;
    private DifficultyStrategy $difficultyStrategy;

    public function __construct(int $level, DifficultyStrategy $difficultyStrategy)
    {
        parent::__construct("Mine","Une mine avec des monstres a combattre");
        $this->level = 1;// La mine commence au niveau 1
        $this->difficultyStrategy = new FibonnaciDifficultyStrategy();
        $this->factory = new MonsterFactory();
        $this->monsters = [];
    }


    // Permet au héros d'entrer dans la mine et de combattre les monstres générés
    public function enter(IHero $hero): void {
        // Génère des monstres basés sur la difficulté actuelle de la mine
        $monsterCount = $this->difficultyStrategy->getMonsterCount($this->level);

        $this ->monsters = []; // Réinitialise la liste des monstres à chaque entrée dans la mine

        for ($i = 0; $i < $monsterCount; $i++) {
            $this->monsters[] = $this->factory->createMonster($this->level);
        }
    }

    // Génère des monstres basés sur la difficulté actuelle de la mine
    public function generateMonster(): void {

    //Comme indique le sujet , le nombre de monstres dans la mine doit suivre la suite de Fibonacci en fonction du niveau de la mine.
    echo "Génération de monstres pour la mine de niveau {$this->level}...\n";


    }
}