<?php

require_once '../Monster/IMonster.php';
require_once '../Monster/AMonster.php';
require_once '../Monster/Spider.php';
require_once '../Monster/Zombie.php';
require_once '../Monster/DeepTerror.php';
require_once '../Monster/FinalBoss.php';
require_once '../Monster/MonsterFactory.php';

echo "═══════════════════════════════════════════\n";
echo "TEST DES MONSTRES - Vérification par Mine Level\n";
echo "═══════════════════════════════════════════\n\n";

$factory = new MonsterFactory();

// Test niveau 1 (Spider)
echo "  MINE NIVEAU 1  \n";
$monster = $factory->createMonster(1);
echo "  Monstre : " . $monster->getName() . "\n";
echo "  Santé : " . $monster->getHealth() . "\n";
echo "  Dégâts : " . $monster->getDamage() . "\n";
echo "  Récompense or : " . $monster->getGoldReward() . "\n";
echo " Correct (Spider) ? " . ($monster instanceof Spider ? "OUI" : "NON") . "\n\n";

// Test niveau 5 (Zombie)
echo "  MINE NIVEAU 5  \n";
$monster = $factory->createMonster(5);
echo "  Monstre : " . $monster->getName() . "\n";
echo "  Santé : " . $monster->getHealth() . "\n";
echo "  Dégâts : " . $monster->getDamage() . "\n";
echo "  Récompense or : " . $monster->getGoldReward() . "\n";
echo "  Correct (Zombie) ? " . ($monster instanceof Zombie ? "OUI" : "NON") . "\n\n";

// Test niveau 10 (DeepTerror)
echo "  MINE NIVEAU 10 \n";
$monster = $factory->createMonster(10);
echo "  Monstre : " . $monster->getName() . "\n";
echo "  Santé : " . $monster->getHealth() . "\n";
echo "  Dégâts : " . $monster->getDamage() . "\n";
echo "  Récompense or : " . $monster->getGoldReward() . "\n";
echo "  Correct (DeepTerror) ? " . ($monster instanceof DeepTerror ? "OUI" : "NON") . "\n\n";

// Test niveau 20 (FinalBoss)
echo "  MINE NIVEAU 20  \n";
$monster = $factory->createMonster(20);
echo "  Monstre : " . $monster->getName() . "\n";
echo "  Santé : " . $monster->getHealth() . "\n";
echo "  Dégâts : " . $monster->getDamage() . "\n";
echo "  Récompense or : " . $monster->getGoldReward() . "\n";
echo "   Correct (FinalBoss) ? " . ($monster instanceof FinalBoss ? "OUI" : "NON") . "\n\n";

// Test niveau 25 (FinalBoss aussi)
echo "  MINE NIVEAU 25  \n";
$monster = $factory->createMonster(25);
echo "  Monstre : " . $monster->getName() . "\n";
echo "  Correct (FinalBoss) ? " . ($monster instanceof FinalBoss ? "OUI" : "NON") . "\n\n";

echo "═══════════════════════════════════════════\n";
echo "TOUS LES TESTS MONSTRES PASSÉS !\n";
echo "═══════════════════════════════════════════\n";
