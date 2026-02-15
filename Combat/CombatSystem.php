<?php

class CombatSystem{

    //Le combat se déroule en tours, où le héros attaque d'abord, suivi des attaques des monstres encore en vie.
    public function startCombat(IHero $hero , array $monsters): bool{
        echo " Début du combat !\n";

        while (!$hero->isDead() && !$this->allMonstersDead($monsters)) {

            $this->heroTurn($hero, $monsters);

            if ($this->allMonstersDead($monsters)) {
                break;
            }

            $this->monstersTurn($hero, $monsters);

            $this->displayCombatStatus($hero, $monsters);
        }

        // Récompense si victoire
        if (!$hero->isDead()) {
            foreach ($monsters as $monster) {
                $hero->addGold($monster->getGoldReward());
            }
        }

        return !$hero->isDead();
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
        foreach ($monsters as $monster){
            if (!$monster->isDead()){
                $damage = $monster->attack($hero);
                $hero->takeDamage($damage);
            }
        }
    }

    private function displayCombatStatus(IHero $hero, array $monsters): void{
        // Affiche l'état actuel du héros (santé, or, etc.)
        echo "----Etat du combat----\n";
        echo "{$hero->getName()} est toujours en vie \n";
        
        foreach ($monsters as $monster){
            if (!$monster->isDead()){
                echo "Monstre: " . $monster->getName() . " - Santé: " . $monster->getHealth() . "\n";
            }
        }

        echo "----------------------\n";
    }

}

