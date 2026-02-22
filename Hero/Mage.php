<?php

/**
 * Classe Mage
 *
 * Représente un héros de type Mage dans le jeu.
 * Le Mage est un utilisateur de magie, spécialisé dans les attaques à distance et les sorts puissants.
 * Il a une santé plus faible que le guerrier ou le paladin, mais compense cela par des dégâts magiques élevés.
 * Il peut apprendre différents sorts selon son niveau :
 * - Niveau 1 : Fireball
 * - Niveau 3 : IceSpike
 * - Niveau 5 : Lightning
 * - Niveau 10 : Cataclysm
 * Cette classe hérite de AHero et implémente les méthodes spécifiques pour déterminer les armes que le Mage peut équiper (bâtons) et son incapacité à équiper des boucliers.
 */
class Mage extends AHero{

    private const DODGE_CHANCE = 0.2;

    /**
     * @var ISpell[] ArrayList des sorts qui ont été appris
     */
    private array $learnedSpells = [];

    /**
     * @var ISpell|null Le sort actuellement sélectionné pour être lancé
     */
    private ?ISpell $selectedSpell = null;

    public function __construct(string $name){
        parent::__construct($name, 80, 80, 25, 150); // Les mages ont une santé de base de 80, mana 150

        $this->setStrategy(new MageCombatStrategy()); // Le mage utilise une stratégie de combat spécifique pour les attaques magiques

        // Apprendre Fireball au démarrage (niveau 1)
        $this->learnSpell(new Fireball());
    }

    public function takeDamage(int $damage): void {
        $random = mt_rand() / mt_getrandmax(); // Génère un nombre aléatoire entre 0 et 1
        if ($random <= self::DODGE_CHANCE) {
            // Le mage esquive l'attaque
            echo $this->name . " esquive l'attaque !\n";
        } else {
            parent::takeDamage($damage);
        }
    }

    public function canEquipWeapon(IWeapon $weapon): bool{
        // Les mages peuvent équiper des bâtons , mais pas des épées
        return $weapon instanceof Staff ;
    }

    public function canEquipShield(): bool{
        // Les mages ne peuvent pas équiper de boucliers comme le guerrier contrairement au Paladin, donc cette méthode retourne false
        return false;
    }

    /**
     * Apprendre un nouveau sort
     */
    public function learnSpell(ISpell $spell): void
    {
        $this->learnedSpells[] = $spell;
        echo "{$this->name} a appris le sort : " . $spell->getName() . "\n";
    }

    /**
     * Retourne les sorts disponibles pour le niveau actuel du Mage
     */
    public function getAvailableSpells(): array
    {
        $available = [];
        foreach ($this->learnedSpells as $spell) {
            if ($spell->getRequiredLevel() <= $this->level) {
                $available[] = $spell;
            }
        }
        return $available;
    }

    /**
     * Sélectionne un sort à lancer
     */
    public function selectSpell(ISpell $spell): void
    {
        if (in_array($spell, $this->learnedSpells)) {
            $this->selectedSpell = $spell;
            echo "{$this->name} a sélectionné le sort : " . $spell->getName() . "\n";
        } else {
            echo "{$this->name} ne connaît pas ce sort.\n";
        }
    }

    /**
     * Lance le sort sélectionné
     */
    public function useSpell(): void
    {
        if (!$this->selectedSpell) {
            echo "{$this->name} n'a pas sélectionné de sort à lancer.\n";
            return;
        }

        if ($this->selectedSpell->getRequiredLevel() > $this->level) {
            echo "{$this->name} ne peut pas lancer ce sort (niveau insuffisant).\n";
            return;
        }

        if ($this->mana < $this->selectedSpell->getManaCost()) {
            echo "{$this->name} n'a pas assez de mana pour lancer " . $this->selectedSpell->getName() . ".\n";
            return;
        }

        // Consommer le mana
        $this->mana -= $this->selectedSpell->getManaCost();
        echo "{$this->name} lance un sort ! Mana restant : " . $this->mana . "/" . $this->maxMana . "\n";
    }

    /**
     * Override de levelUp pour apprendre les sorts
     */
    public function levelUp(): void
    {
        parent::levelUp();

        // Apprendre les sorts selon le niveau
        if ($this->level == 3) {
            $this->learnSpell(new IceSpike());
        } elseif ($this->level == 5) {
            $this->learnSpell(new Lightning());
        } elseif ($this->level == 10) {
            $this->learnSpell(new Cataclysm());
        }
    }

    /**
     * Retourne tous les sorts appris
     */
    public function getLearnedSpells(): array
    {
        return $this->learnedSpells;
    }
}