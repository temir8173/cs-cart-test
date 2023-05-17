<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Shop\SpecialItemNamesList;
use Shop\Shop;
use Shop\Item;

$items = array(
    new Item('Dexterity vest', 10, 20),
    new Item(SpecialItemNamesList::BLUE_CHEESE, 2, 0),
    new Item('Healing potion', 5, 7),
    new Item(SpecialItemNamesList::MJOLNIR, 0, 80),
    new Item(SpecialItemNamesList::MJOLNIR, -1, 80),
    new Item(SpecialItemNamesList::CONCERT_TICKETS, 15, 20),
    new Item(SpecialItemNamesList::CONCERT_TICKETS, 10, 49),
    new Item(SpecialItemNamesList::CONCERT_TICKETS, 5, 49),
//    new Item(SpecialItemNamesList::MAGIC_CAKE, 3, 9),
//    new Item(SpecialItemNamesList::MAGIC_CAKE, 5, 34)
);

$app = new Shop($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------" . PHP_EOL);
    echo("name, sellIn, quality" . PHP_EOL);
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
