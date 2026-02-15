<?php
// test/test_heroes.php
require_once "../Items/Inventory.php";
require_once "../Items/IWeapon.php";
require_once "../Hero/IHero.php";
require_once "../Hero/AHero.php";
require_once "../Hero/Warrior.php";
require_once "../Hero/Mage.php";
require_once "../Hero/Paladin.php";

function test_hero_creation() {
    $mage = new Mage('Merlin', 100, 100, 20);
    $paladin = new Paladin('Arthur', 120, 120, 15);
    $warrior = new Warrior('Ragnar', 150, 150, 25);
    
    echo "Test Mage: ".($mage->getName() === 'Merlin' ? 'OK' : 'FAIL')."\n";
    echo "Test Paladin: ".($paladin->getName() === 'Arthur' ? 'OK' : 'FAIL')."\n";
    echo "Test Warrior: ".($warrior->getName() === 'Ragnar' ? 'OK' : 'FAIL')."\n";
}

test_hero_creation();
