<?php

require_once '../Hero/IHero.php';
require_once '../Hero/ISpell.php';
require_once '../Items/Item.php';
require_once '../Items/IWeapon.php';
require_once '../Items/Inventory.php';
require_once '../Combat/ICombatStrategy.php';
require_once '../Building/IBuilding.php';
require_once '../Hero/AHero.php';
require_once '../Hero/Mage.php';
require_once '../Hero/Fireball.php';
require_once '../Hero/IceSpike.php';
require_once '../Hero/Lightning.php';
require_once '../Hero/Cataclysm.php';
require_once '../Combat/MageCombatStrategy.php';
require_once '../Building/Building.php';
require_once '../Building/Inn.php';
require_once '../Building/Church.php';
require_once '../Building/Village.php';

echo "═══════════════════════════════════════════\n";
echo "TEST DES BÂTIMENTS - Interactions\n";
echo "═══════════════════════════════════════════\n\n";

// Test Inn
echo " TEST DE L'AUBERGE (INN)\n";
$mage = new Mage("Gandalf");
$mage->takeDamage(50); // Réduit la santé

echo "  Santé avant : " . $mage->getHealth() . "\n";
echo "  Or avant : " . $mage->getGold() . "\n";

$inn = new Inn(10, 50);
$mage->addGold(20); // Ajoute de l'or pour pouvoir se soigner
echo "  Entre à l'auberge\n";
$inn->enter($mage);

echo "  Santé après : " . $mage->getHealth() . "\n";
echo "  Or après : " . $mage->getGold() . "\n\n";

// Test Church
echo " TEST DE L'ÉGLISE (CHURCH)\n";
$mageBIS = new Mage("Merlin");
$church = new Church();

echo "  État avant : " . ($church->canBeUsed() ? "Utilisable" : "Non utilisable") . "\n";
echo "  Entre à l'église\n";
$church->enter($mageBIS);

echo "  État après : " . ($church->canBeUsed() ? "Utilisable" : "Non utilisable") . "\n";
echo "  Peut être utilisée ? " . ($church->canBeUsed() ? "NON (déjà utilisée)" : "NON (déjà utilisée)") . "\n";

echo "  Recharge l'église\n";
$church->recharge();
echo "  Peut être utilisée maintenant ? " . ($church->canBeUsed() ? "OUI" : "NON") . "\n\n";

// Test Village
echo "TEST DU VILLAGE\n";
$village = new Village();
echo "  Bâtiments avant : " . count($village->getBuilding()) . "\n";

$village->addBuilding(new Inn());
$village->addBuilding(new Church());
echo "   Bâtiments après : " . count($village->getBuilding()) . "\n";

echo "  Affichage du village :\n";
$village->displayBuilding();
echo "\n";

echo "═══════════════════════════════════════════\n";
echo " TOUS LES TESTS BÂTIMENTS PASSÉS !\n";
echo "═══════════════════════════════════════════\n";
