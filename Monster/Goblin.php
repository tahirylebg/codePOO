<?php

class Goblin extends Monster
{
    public function __construct(int $level)
    {
        parent::__construct("Goblin",30 * $level,5 * $level,10 * $level);
    }
}
