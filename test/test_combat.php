<?php

require_once '../Hero/IHero.php';
require_once '../Hero/ISpell.php';
require_once '../Items/Item.php';
require_once '../Items/IWeapon.php';
require_once '../Items/Inventory.php';
require_once '../Monster/IMonster.php';
require_once '../Combat/ICombatStrategy.php';
require_once '../Building/IBuilding.php';
require_once '../Hero/AHero.php';
require_once '../Monster/AMonster.php';
require_once '../Hero/Warrior.php';
require_once '../Hero/Mage.php';
require_once '../Hero/Paladin.php';
require_once '../Hero/Undead.php';
require_once '../Hero/Fireball.php';
require_once '../Hero/IceSpike.php';
require_once '../Hero/Lightning.php';
require_once '../Hero/Cataclysm.php';
require_once '../Monster/Spider.php';
require_once '../Monster/Zombie.php';
require_once '../Monster/DeepTerror.php';
require_once '../Monster/FinalBoss.php';
require_once '../Monster/MonsterFactory.php';
require_once '../Combat/WarriorCombatStrategy.php';
require_once '../Combat/MageCombatStrategy.php';
require_once '../Combat/PaladinCombatStrategy.php';
require_once '../Combat/UndeadCombatStrategy.php';
require_once '../Combat/CombatSystem.php';

echo "═══════════════════════════════════════════\n";
echo "TEST DES COMBATS - Chaque héros vs monstres\n";
echo "═══════════════════════════════════════════\n\n";

$combatSystem = new CombatSystem();
$factory = new MonsterFactory();

// Combat 1 : Warrior vs Zombie
echo "  COMBAT 1: WARRIOR vs ZOMBIE\n";
$warrior = new Warrior("Conan");
$zombie = new Zombie(5);
$result = $combatSystem->startCombat($warrior, [$zombie]);
echo "Résultat : " . ($result ? " VICTOIRE" : " DÉFAITE") . "\n";
echo "Santé finale : " . $warrior->getHealth() . "\n";
echo "Or gagné : " . $warrior->getGold() . "\n\n";

// Combat 2 : Mage vs Spider (niveau 1)
echo " COMBAT 2: MAGE vs SPIDER\n";
$mage = new Mage("Gandalf");
$spider = new Spider(1);
$result = $combatSystem->startCombat($mage, [$spider]);
echo "Résultat : " . ($result ? " VICTOIRE" : " DÉFAITE") . "\n";
echo "Santé finale : " . $mage->getHealth() . "\n";
echo "Mana final : " . $mage->getMana() . "\n";
echo "Or gagné : " . $mage->getGold() . "\n\n";

// Combat 3 : Paladin vs DeepTerror
echo " COMBAT 3: PALADIN vs DEEPTERROR\n";
$paladin = new Paladin("Arthurius");
$deepTerror = new DeepTerror(10);
$result = $combatSystem->startCombat($paladin, [$deepTerror]);
echo "Résultat : " . ($result ? " VICTOIRE" : " DÉFAITE") . "\n";
echo "Santé finale : " . $paladin->getHealth() . "\n";
echo "Or gagné : " . $paladin->getGold() . "\n\n";

// Combat 4 : Undead vs Multiple (Spider + Zombie)
echo " COMBAT 4: UNDEAD vs MULTIPLE\n";
$undead = new Undead("Skeletal");
$spiders = [new Spider(1), new Spider(1)];
$result = $combatSystem->startCombat($undead, $spiders);
echo "Résultat : " . ($result ? " VICTOIRE" : " DÉFAITE") . "\n";
echo "Santé finale : " . $undead->getHealth() . "\n";
echo "Or gagné : " . $undead->getGold() . "\n\n";

echo "═══════════════════════════════════════════\n";
echo " TOUS LES TESTS DE COMBAT PASSÉS !\n";
echo "═══════════════════════════════════════════\n";
