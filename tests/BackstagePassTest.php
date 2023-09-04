<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Controller\GildedRose;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;

class BackstagePassTest extends TestCase
{
    public function testBackStagePassIncreasesQualityWithOneWhenPositiveSellInGreaterThenTen(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 11, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(11, $item->quality);
    }

    public function testBackStagePassIncreasesQualityWithTwoWhenPositiveSellInLesserOrEqualThenTen(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(12, $item->quality);
    }

    public function testBackStagePassIncreasesQualityWithThreeWhenPositiveSellInLesserOrEqualThenFive(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(13, $item->quality);
    }

    public function testBackStagPassQualitySetsToZeroWhenGoesToNegativeSellIn(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(0, $item->quality);
    }

    public function testQualityCannotBeLowerThenZero(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', -10, 0);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(0, $item->quality);
    }

    public function testQualityCannotBeHigherThenFifty(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 9, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(50, $item->quality);
    }

    public function testQualityCannotBeHigherThenFiftyWhenSellInIsFive(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(50, $item->quality);
    }

    public function testQualityCannotBeHigherThenFiftyWhenSellInIsLessThenFive(): void
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 3, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(50, $item->quality);
    }
}
