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

    public function enter(IHero $hero): void {

    }

    public function generateMonster(): void {
    }
}