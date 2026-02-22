<?php

require_once '../Hero/IHero.php';
require_once '../Hero/ISpell.php';
require_once '../Items/Item.php';
require_once '../Items/IWeapon.php';
require_once '../Items/Inventory.php';
require_once '../Items/HealingPotion.php';
require_once '../Items/ManaPotion.php';
require_once '../Items/StrengthPotion.php';
require_once '../Items/AbstractWeapon.php';
require_once '../Items/Sword.php';
require_once '../Items/Staff.php';
require_once '../Items/Shield.php';
require_once '../Combat/ICombatStrategy.php';
require_once '../Combat/MageCombatStrategy.php';
require_once '../Hero/AHero.php';
require_once '../Hero/Mage.php';
require_once '../Hero/Fireball.php';

echo "═══════════════════════════════════════════\n";
echo "TEST DES ITEMS - Inventaire et Potions\n";
echo "═══════════════════════════════════════════\n\n";

// Test Inventory
echo " TEST INVENTAIRE\n";
$inventory = new Inventory();
echo "  Nombre d'items : " . $inventory->getItemCount() . "\n";

// Ajouter des potions
$healing = new HealingPotion();
$mana = new ManaPotion();
$strength = new StrengthPotion();

echo "   Ajout de 3 potions\n";
$inventory->addItem($healing);
$inventory->addItem($mana);
$inventory->addItem($strength);

echo "  Nombre d'items : " . $inventory->getItemCount() . "\n";
echo "  Nombre de potions de soin : " . $inventory->getPotionCount() . "\n\n";

// Test utilisation de potion
echo " TEST UTILISATION POTION\n";
$mage = new Mage("Gandalf");
echo "  Santé avant : " . $mage->getHealth() . "\n";

$inventory->usePotion($mage);

echo "  Santé après : " . $mage->getHealth() . "\n";
echo "  Items restants : " . $inventory->getItemCount() . "\n\n";

// Test Weapons
echo "  TEST ARMES\n";
$sword = new Sword("Claymore", 15, 100);
$staff = new Staff("Bâton Magique", 20, 150);
$shield = new Shield("Bouclier de Fer", 10, 80);

echo "  Épée - Dégâts : " . $sword->getDamage() . ", Prix : " . $sword->getPrice() . "\n";
echo "  Bâton - Dégâts : " . $staff->getDamage() . ", Prix : " . $staff->getPrice() . "\n";
echo "  Bouclier - Protection : " . $shield->getProtection() . ", Prix : " . $shield->getPrice() . "\n\n";

// Test items pricing
echo " TEST PRIX\n";
echo "  Potion de Soin : " . $healing->getPrice() . " or\n";
echo "  Potion de Mana : " . $mana->getPrice() . " or\n";
echo "  Potion de Force : " . $strength->getPrice() . " or\n\n";

echo "═══════════════════════════════════════════\n";
echo " TOUS LES TESTS ITEMS PASSÉS !\n";
echo "═══════════════════════════════════════════\n";
