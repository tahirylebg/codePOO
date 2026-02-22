<?php


/**
 * Classe CombatSystem
 *
 * Gère le déroulement d'un combat entre un héros et une liste de monstres.
 * Utilise les stratégies de combat pour calculer les dégâts et les chances d'esquive.
 * Affiche l'état du combat à chaque tour et gère les récompenses en cas de victoire.
 */
class CombatSystem{

    /**
     * Lance un combat entre un héros et une liste de monstres
     * Retourne true si le héros a gagné, false sinon
     */
    public function startCombat(IHero $hero, array $monsters): bool
    {
        // Affichage du début du combat
        echo "═══════════════════════════════════════════\n";
        echo "DÉBUT DU COMBAT !\n";
        echo "═══════════════════════════════════════════\n";
        // Affiche les monstres rencontrés
        echo "Vous êtes confronté à :\n";
        while (!$hero->isDead() && !$this->allMonstersDead($monsters)) {

            $this->displayCombatStatus($hero, $monsters);
            
            $this->heroTurn($hero, $monsters);
            // Vérifier si tous les monstres sont morts après le tour du héros
            if ($this->allMonstersDead($monsters)) {
                echo "\n VICTOIRE ! Tous les monstres sont vaincus !\n\n";
                break;
            }

            $this->monstersTurn($hero, $monsters);

            // Appliquer les effets passifs du héros (Heal Aura du Paladin, etc.)
            if ($hero instanceof Paladin) {
                $hero->applyHealAura();
            }
        }

        // Gestion des récompenses en cas de victoire
        if (!$hero->isDead()) {
            $this->grantRewards($hero, $monsters);
            return true;
        } else {
            echo "\n DÉFAITE ! {$hero->getName()} a été vaincu.\n\n";
            return false;
        }
    }

    /**
     * Vérifie si tous les monstres sont morts
     */
    private function allMonstersDead(array $monsters): bool
    {
        foreach ($monsters as $monster) {
            if (!$monster->isDead()) {
                return false;
            }
        }
        return true;
    }

    /**
     * Tour du héros : peut attaquer, lancer un sort, ou utiliser une potion
     */
    private function heroTurn(IHero $hero, array $monsters): void
    {
        echo "\n--- Tour de {$hero->getName()} ---\n";
        
        // Trouver le premier monstre vivant
        $targetMonster = null;
        foreach ($monsters as $monster) {
            if (!$monster->isDead()) {
                $targetMonster = $monster;
                break;
            }
        }

        if (!$targetMonster) {
            return;
        }

        // Le héros choisit son action (par défaut : attaque)
        // Dans un vrai jeu, ce serait déterminé par l'entrée utilisateur
        $heroAction = $this->determineHeroAction($hero);

        match($heroAction) {
            'attack' => $this->performAttack($hero, $targetMonster),
            'spell' => $this->performSpell($hero, $targetMonster),
            'potion' => $this->performPotion($hero),
            default => $this->performAttack($hero, $targetMonster),
        };
    }

    /**
     * Détermine l'action que le héros va effectuer
     * Pour l'instant, utilise une logique simple
     */
    private function determineHeroAction(IHero $hero): string
    {
        // Si c'est un Mage avec du mana et des sorts disponibles
        if ($hero instanceof Mage) {
            if ($hero->getMana() > 30 && !empty($hero->getAvailableSpells())) {
                return 'spell';
            }
            // Si mana bas et potions disponibles
            if ($hero->getMana() < 50 && $hero->getInventory()->getPotionCount() > 0) {
                return 'potion';
            }
        }

        // Si c'est un Paladin avec peu de santé et la Heal Aura disponible
        if ($hero instanceof Paladin) {
            if ($hero->getHealth() < $hero->getMaxHealth() / 2) {
                // Les dégâts sont meilleurs que les potions
                return 'attack';
            }
        }

        // Par défaut, attaque
        return 'attack';
    }

    /**
     * Effectue une attaque normale
     */
    private function performAttack(IHero $hero, IMonster $monster): void
    {
        $damage = $hero->attack($monster);
        echo "{$hero->getName()} attaque {$monster->getName()} et inflige {$damage} dégâts !\n";
    }

    /**
     * Effectue un sort (si le héros peut en lancer)
     */
    private function performSpell(IHero $hero, IMonster $monster): void
    {
        if (!$hero instanceof Mage) {
            $this->performAttack($hero, $monster);
            return;
        }

        $availableSpells = $hero->getAvailableSpells();
        if (empty($availableSpells)) {
            $this->performAttack($hero, $monster);
            return;
        }

        // Utiliser le premier sort disponible
        $spell = $availableSpells[0];
        $hero->selectSpell($spell);

        if ($hero->getMana() >= $spell->getManaCost()) {
            $hero->consumeMana($spell->getManaCost());
            $spell->cast($monster);
            echo "{$hero->getName()} a lancé {$spell->getName()} !\n";
        } else {
            // Pas assez de mana, attaquer à la place
            $this->performAttack($hero, $monster);
        }
    }

    /**
     * Utilise une potion
     */
    private function performPotion(IHero $hero): void
    {
        if ($hero->getInventory()->usePotion($hero)) {
            echo "{$hero->getName()} a utilisé une potion !\n";
        } else {
            echo "{$hero->getName()} n'a pas de potion à utiliser.\n";
        }
    }

    /**
     * Tour des monstres : chaque monstre vivant attaque le héros
     */
    private function monstersTurn(IHero $hero, array $monsters): void
    {
        echo "\n--- Tours des monstres ---\n";
        
        foreach ($monsters as $monster) {
            if (!$monster->isDead()) {
                // Vérifier si le héros esquive (pour les Mages)
                if ($hero instanceof Mage && $this->shouldHeroDodge()) {
                    echo "{$hero->getName()} esquive l'attaque de {$monster->getName()} !\n";
                    continue;
                }

                $damage = $monster->attack($hero);
                echo "{$monster->getName()} attaque {$hero->getName()} et inflige {$damage} dégâts !\n";
            }
        }
    }

    /**
     * Détermine si le héros esquive
     */
    private function shouldHeroDodge(): bool
    {
        // 20% de chance d'esquive pour les Mages
        $random = mt_rand() / mt_getrandmax();
        return $random < 0.2;
    }

    /**
     * Accorde les récompenses du combat , calculées à partir des monstres vaincus
     */
    private function grantRewards(IHero $hero, array $monsters): void
    {
        $totalGold = 0;
        $totalXp = 0;

        foreach ($monsters as $monster) {
            $totalGold += $monster->getGoldReward();
            // XP reward - utiliser le gold reward comme base pour XP
            $totalXp += $monster->getGoldReward() * 2;
        }

        $hero->addGold($totalGold);
        $hero->gainXp($totalXp);

        echo "Récompenses :\n";
        echo "  - Or : +{$totalGold}\n";
        echo "  - XP : +{$totalXp}\n";
    }

    /**
     * Affiche l'état du combat
     */
    private function displayCombatStatus(IHero $hero, array $monsters): void
    {
        echo "\n┌─── État du Combat ───┐\n";
        echo "│ {$hero->getName()}\n";
        echo "│   Santé : " . $hero->getHealth() . "/" . $hero->getMaxHealth() . " HP\n";
        
        if ($hero instanceof Mage) {
            echo "│   Mana  : " . $hero->getMana() . "/" . $hero->getMaxMana() . " MP\n";
        }
        
        echo "│   Niveau: {$hero->getLevel()}\n";
        echo "│\n";

        echo "│ Monstres :\n";
        foreach ($monsters as $monster) {
            if (!$monster->isDead()) {
                echo "│   - " . $monster->getName() . " : " . $monster->getHealth() . " HP\n";
            }
        }
        
        echo "└──────────────────────┘\n";
    }
}

