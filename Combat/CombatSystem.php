<?php

class CombatSystem{
    public function startCombat(IHero $hero, IMonster $monsters){
    }

    // Boucle de combat : le héros et les monstres s'affrontent jusqu'à ce que l'un d'eux soit vaincu
    while (!$hero->isDead() && !$this->allMonstersDead($monsters)){
        
    }

    // Vérifie si tous les monstres sont morts
    private function allMonstersDead(array $monsters): bool{
        foreach ($monsters as $monster){
            if (!$monster->isDead()){
                return false;
            }
        }
        return true;
    }

    
}
