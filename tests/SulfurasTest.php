<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Controller\GildedRose;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;

class SulfurasTest extends TestCase
{
    public function testSulfurasDoesNotDecreaseSellIn(): void
    {
        $sulfuras = new Item('Sulfuras, Hand of Ragnaros', 10, 10);

        $inn = new GildedRose([$sulfuras]);
        $inn->updateQuality();
        $this->assertEquals(10, $sulfuras->sellIn);
    }

    public function testSulfurasDoesNotDecreaseInQuality(): void
    {
        $sulfuras = new Item('Sulfuras, Hand of Ragnaros', 10, 10);

        $inn = new GildedRose([$sulfuras]);
        $inn->updateQuality();
        $this->assertEquals(10, $sulfuras->quality);
    }
}
