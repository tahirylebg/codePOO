<?php

class Mine extends Building{
    private int $level; //Niveau de la mine
    private array $monsters; // Liste des monstres dans la mine 
    private MonsterFactory $factory; // Usine pour faire des monstres 
    private DifficultyStrategy $difficultyStrategy; // Stratégie pour déterminer la difficulté de la mine (nombre de monstres)

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

    $this->generateMonster();

    $combat = new CombatSystem();

    // Le héros entre dans la mine et affronte les monstres générés
    $win = $combat->startCombat($hero, $this->monsters);
    if ($win) {
        echo "Félicitations ! Vous avez vaincu tous les monstres de la mine de niveau {$this->level}.\n";
        $this->level++; // Augmente le niveau de la mine pour la prochaine entrée
    } else {
        echo "Vous avez été vaincu par les monstres de la mine de niveau {$this->level}. Essayez à nouveau !\n";
    }
    }
}