<?php

require_once '../Hero/IHero.php';
require_once '../Hero/ISpell.php';
require_once '../Items/Item.php';
require_once '../Items/IWeapon.php';
require_once '../Monster/IMonster.php';
require_once '../Combat/ICombatStrategy.php';
require_once '../Building/IBuilding.php';
require_once '../Hero/AHero.php';
require_once '../Monster/AMonster.php';
require_once '../Building/Building.php';
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
require_once '../Items/Inventory.php';
require_once '../Items/HealingPotion.php';
require_once '../Items/ManaPotion.php';
require_once '../Items/StrengthPotion.php';
require_once '../Items/AbstractWeapon.php';
require_once '../Items/Sword.php';
require_once '../Items/Staff.php';
require_once '../Items/Shield.php';
require_once '../Combat/WarriorCombatStrategy.php';
require_once '../Combat/MageCombatStrategy.php';
require_once '../Combat/PaladinCombatStrategy.php';
require_once '../Combat/UndeadCombatStrategy.php';
require_once '../Combat/CombatSystem.php';
require_once '../Building/Inn.php';
require_once '../Building/Mine.php';
require_once '../Building/Church.php';
require_once '../Building/Village.php';

// Test basique
echo "═══════════════════════════════════════════\n";
echo "TEST DE VALIDATION - Village V2\n";
echo "═══════════════════════════════════════════\n\n";

// Créer un héros
echo " Création d'un Mage\n";
$mage = new Mage("Gandalf");
echo "  Niveau : " . $mage->getLevel() . "\n";
echo "  Santé : " . $mage->getHealth() . "/" . $mage->getMaxHealth() . "\n";
echo "  Mana : " . $mage->getMana() . "/" . $mage->getMaxMana() . "\n";
echo "  Sorts appris : " . count($mage->getLearnedSpells()) . "\n\n";

// Créer un monstre
echo " Création d'une Spider (niveau 1)...\n";
$spider = new Spider(1);
echo "  Santé : " . $spider->getHealth() . "\n";
echo "  Dégâts : " . $spider->getDamage() . "\n";
echo "  Or récompense : " . $spider->getGoldReward() . "\n\n";

// Combat
echo " Lancement d'un combat...\n";
$combatSystem = new CombatSystem();
$result = $combatSystem->startCombat($mage, [$spider]);

echo "\n Résultat du combat : " . ($result ? "VICTOIRE" : "DÉFAITE") . "\n";
echo "  Santé du Mage : " . $mage->getHealth() . "/" . $mage->getMaxHealth() . "\n";
echo "  Niveau du Mage : " . $mage->getLevel() . "\n";
echo "  Or du Mage : " . $mage->getGold() . "\n\n";

echo "═══════════════════════════════════════════\n";
echo "TEST TERMINÉ AVEC SUCCÈS !\n";
echo "═══════════════════════════════════════════\n";
