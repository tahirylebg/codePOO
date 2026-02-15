<?php
// test/test_items.php
require_once '../Items/Staff.php';
require_once '../Items/Sword.php';
require_once '../Items/Shield.php';
require_once '../Items/HealthingPotion.php';

function test_items() {
    $staff = new Staff('Baguette magique', 10);
    $sword = new Sword('Excalibur', 20);
    $shield = new Shield('Pavois', 5);
    $potion = new HealthingPotion('Hydromel', 30);
    
    echo "Test Staff: ".($staff->getName() === 'Baguette magique' ? 'OK' : 'FAIL')."\n";
    echo "Test Sword: ".($sword->getName() === 'Excalibur' ? 'OK' : 'FAIL')."\n";
    echo "Test Shield: ".($shield->getName() === 'Pavois' ? 'OK' : 'FAIL')."\n";
    echo "Test Potion: ".($potion->getName() === 'Hydromel' ? 'OK' : 'FAIL')."\n";
}

test_items();
