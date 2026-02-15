<?php

require_once __DIR__ . "/../Building/IDifficultyStrategy.php";
require_once __DIR__ . "/../Building/FibonacciSequence.php";
require_once __DIR__ . "/../Building/FibonacciDifficulty.php";

require_once __DIR__ . "/../Building/IBuilding.php";
require_once __DIR__ . "/../Building/ABuilding.php";

require_once __DIR__ . "/../Monster/IMonster.php";
require_once __DIR__ . "/../Monster/AMonster.php";
require_once __DIR__ . "/../Monster/Goblin.php";
require_once __DIR__ . "/../Monster/Orc.php";
require_once __DIR__ . "/../Monster/Dragon.php";
require_once __DIR__ . "/../Monster/MonsterFactory.php";

require_once __DIR__ . "/../Combat/CombatSystem.php";

require_once __DIR__ . "/../Hero/IHero.php";

require_once __DIR__ . "/../Building/Inn.php";
require_once __DIR__ . "/../Building/Mine.php";
require_once __DIR__ . "/../Items/Merchant.php";



function test_buildings() {
    $inn = new Inn(10);
    $mine = new Mine();
    $village = new Village('Small Village');
    
    echo "Test Inn: ".($inn->getName() === 'Golden Inn' ? 'OK' : 'FAIL')."\n";
    echo "Test Mine: ".($mine->getName() === 'Mine' ? 'OK' : 'FAIL')."\n";
    echo "Test Village: ".($village->getName() === 'Small Village' ? 'OK' : 'FAIL')."\n";
}

test_buildings();
