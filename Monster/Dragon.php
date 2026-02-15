<?php

class Dragon extends AMonster{
    public function __construct(int $level)
    {
        parent::__construct("Dragon",120 * $level,20 * $level,50 * $level);
    }
}
