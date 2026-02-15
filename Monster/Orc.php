<?php

class Orc extends Monster
{
    public function __construct(int $level)
    {
        parent::__construct("Orc",60 * $level,10 * $level,20 * $level);
    }
}
