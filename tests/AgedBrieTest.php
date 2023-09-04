<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Controller\GildedRose;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;

class AgedBrieTest extends TestCase
{
    public function testAgedBrieIncreasedWithTwoPastSellIn(): void
    {
        $agedBrie = new Item('Aged Brie', -10, 10);

        $inn = new GildedRose([$agedBrie]);
        $inn->updateQuality();
        $this->assertEquals(12, $agedBrie->quality);
    }

    public function testAgedBrieIncreasedWithOneBeforeSellIn(): void
    {
        $agedBrie = new Item('Aged Brie', 10, 10);

        $inn = new GildedRose([$agedBrie]);
        $inn->updateQuality();
        $this->assertEquals(11, $agedBrie->quality);
    }

    public function testAgedBrieQualityCannotBeGreaterThenFifty(): void
    {
        $agedBrie = new Item('Aged Brie', 10, 50);

        $inn = new GildedRose([$agedBrie]);
        $inn->updateQuality();
        $this->assertEquals(50, $agedBrie->quality);
    }
}
