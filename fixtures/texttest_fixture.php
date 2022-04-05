<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;


class Start
{

    public static function run() : void
    {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            // this conjured item does not work properly yet
            new Item('Conjured Mana Cake', 3, 6),
        ];
        
        $app = new GildedRose($items);
        
        $days = 20;
        if (isset($argv) && count($argv) > 1) {
            $days = (int) $argv[1];
        }
        
        for ($i = 0; $i < $days; $i++) {
            echo "<pre>";
            echo "-------- day ${i} --------" . PHP_EOL;
            // echo 'name, sellIn, quality' . PHP_EOL;
            
            echo "<table >
            <tr >
              <th>name</th>
              <th>sellIn</th>
              <th>quality</th>
            </tr>";
        
            foreach ($items as $item) {
                echo "<tr>";
                echo"<td>" .$item->name. "</td>
                <td>" .$item->sell_in. "</td>
                <td>" .$item->quality. "</td>";
              
                echo "</tr>";
            
            }
            echo "</table>";
            
            $app->updateQuality();
            
        }
        
    }
    
}

