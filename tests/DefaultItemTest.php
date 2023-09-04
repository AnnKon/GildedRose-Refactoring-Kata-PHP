<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Controller\GildedRose;
use GildedRose\Models\Item;
use PHPUnit\Framework\TestCase;

class DefaultItemTest extends TestCase
{
    public function testQualityCannotBeNegative(): void
    {
        $item = new Item('Beer', 0, 0);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertGreaterThanOrEqual(0, $item->quality);
    }

    public function testQualityDecreasesWithOneWithPositiveSellIn(): void
    {
        $item = new Item('Beer', 10, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(49, $item->quality);
    }

    public function testQualityDecreasesWithTwoWithNegativeSellIn(): void
    {
        $item = new Item('Beer', 0, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(48, $item->quality);
    }
}
