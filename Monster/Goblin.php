<?php

class Goblin extends AMonster
{
    public function __construct(int $level)
    {
        parent::__construct("Goblin",30 * $level,5 * $level,10 * $level);
    }
}
