<?php

class CombatSystem{

    //Le combat se déroule en tours, où le héros attaque d'abord, suivi des attaques des monstres encore en vie.
    public function startCombat(IHero $hero , array $monsters): bool {
        while (!$hero -> isDead() !$this->allMonstersDead($monsters)){

            
        }
    }

    // Boucle de combat : le héros et les monstres s'affrontent jusqu'à ce que l'un d'eux soit vaincu
    while (!$hero->isDead() && !$this->allMonstersDead($monsters)){
        
    }

    // Vérifie si tous les monstres sont morts
    private function allMonstersDead(array $monsters): bool{
        // Parcourt tous les monstres et vérifie s'ils sont tous morts
        foreach ($monsters as $monster){
            if (!$monster->isDead()){
                return false;
            }
        }
        return true;
    }


  // Tour du héros : le héros attaque le premier monstre vivant dans la liste
    private function heroTurn(IHero $hero, array $monsters): void{
        // Le héros attaque le premier monstre vivant dans la liste
        foreach ($monsters as $monster){
            if (!$monster->isDead()){
                $hero->attack($monster);
                break; // Le héros attaque un seul monstre par tour, donc on sort de la boucle après la première attaque
            }
        }
    }

    // Tour des monstres : chaque monstre vivant attaque le héros
    private function monstersTurn(IHero $hero, array $monsters): void{
        // Chaque monstre vivant attaque le héros
        foreach ($monsters as $monster){
            if (!$monster->isDead()){
                $monster->attack($hero);
            }
        }

    }

    

}
