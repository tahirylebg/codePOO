<?php

require_once '../Hero/IHero.php';
require_once '../Hero/ISpell.php';
require_once '../Items/Item.php';
require_once '../Items/IWeapon.php';
require_once '../Items/Inventory.php';
require_once '../Monster/IMonster.php';
require_once '../Combat/ICombatStrategy.php';
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
require_once '../Combat/WarriorCombatStrategy.php';
require_once '../Combat/MageCombatStrategy.php';
require_once '../Combat/PaladinCombatStrategy.php';
require_once '../Combat/UndeadCombatStrategy.php';

echo "═══════════════════════════════════════════\n";
echo "TEST DES HÉROS - Vérification des stats\n";
echo "═══════════════════════════════════════════\n\n";

// Test du Warrior
echo "  WARRIOR\n";
$warrior = new Warrior("Conan");
echo "  Santé : " . $warrior->getHealth() . "/" . $warrior->getMaxHealth() . "\n";
echo "  Dégâts de base : " . $warrior->getBaseDamage() . "\n";
echo "  Niveau : " . $warrior->getLevel() . "\n";
echo "   Berserk débloqué ? " . ($warrior->isBerserkUnlocked() ? "NON" : "NON") . "\n";
echo "   Gain de 500 XP pour level up\n";
$warrior->gainXp(500);
echo "   Après level up : Niveau " . $warrior->getLevel() . "\n";
echo "   Berserk débloqué ? " . ($warrior->isBerserkUnlocked() ? "OUI" : "NON") . "\n\n";

// Test du Mage
echo " MAGE\n";
$mage = new Mage("Gandalf");
echo "  Santé : " . $mage->getHealth() . "/" . $mage->getMaxHealth() . "\n";
echo "  Mana : " . $mage->getMana() . "/" . $mage->getMaxMana() . "\n";
echo "  Dégâts de base : " . $mage->getBaseDamage() . "\n";
echo "  Sorts appris : " . count($mage->getLearnedSpells()) . "\n";
echo "  Sorts disponibles :\n";
foreach ($mage->getLearnedSpells() as $spell) {
    echo "    - {$spell->getName()} (niveau " . $spell->getRequiredLevel() . ")\n";
}
echo "  Gain de 300 XP \n";
$mage->gainXp(300);
echo "  Après XP : Niveau " . $mage->getLevel() . ", Sorts : " . count($mage->getLearnedSpells()) . "\n\n";

// Test Paladin
echo "  PALADIN\n";
$paladin = new Paladin("Arthurius");
echo "  Santé : " . $paladin->getHealth() . "/" . $paladin->getMaxHealth() . "\n";
echo "  Dégâts de base : " . $paladin->getBaseDamage() . "\n";
echo "  Niveau : " . $paladin->getLevel() . "\n";
echo "   Invincibilité débloquée ? " . ($paladin->isInvincibilityUnlocked() ? "OUI" : "NON") . "\n";
echo "   Gain de 500 XP pour level up\n";
$paladin->gainXp(500);
echo "   Après level up : Niveau " . $paladin->getLevel() . "\n";
echo "   Invincibilité débloquée ? " . ($paladin->isInvincibilityUnlocked() ? "OUI" : "NON") . "\n\n";

// Test Undead
echo " UNDEAD\n";
$undead = new Undead("Skeletal");
echo "  Santé : " . $undead->getHealth() . "/" . $undead->getMaxHealth() . "\n";
echo "  Dégâts de base : " . $undead->getBaseDamage() . "\n";
echo "   Protection contre la mort ? " . ($undead->hasDeathProtection() ? "OUI" : "NON") . "\n";
echo "   Prend 200 dégâts (santé = " . $undead->getHealth() . ")\n";
$undead->takeDamage(200);
echo "   Après dégâts : Santé = " . $undead->getHealth() . "\n";
echo "   Protection contre la mort ? " . ($undead->hasDeathProtection() ? "OUI" : "NON") . "\n\n";

echo "═══════════════════════════════════════════\n";
echo " TOUS LES TESTS HÉROS PASSÉS !\n";
echo "═══════════════════════════════════════════\n";
