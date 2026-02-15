<?php
// test/test_monsters.php
require_once "../Monster/IMonster.php";
require_once "../Monster/AMonster.php";
require_once "../Monster/Goblin.php";
require_once "../Monster/Orc.php";
require_once "../Monster/Dragon.php";


function test_monsters() {
    $dragon = new Dragon(2);
    $orc = new Orc(1);
    $goblin = new Goblin(3);

    echo "Test Dragon: OK\n";
    echo "Test Orc: OK\n";
    echo "Test Goblin: OK\n";
}

test_monsters();
