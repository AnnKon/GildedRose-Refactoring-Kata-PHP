<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;

class AgedBrie implements ItemInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality >= 50) {
            $item->quality = 50;
            return;
        }

        if ($item->sellIn < 0) {
            $item->quality += 2;
            return;
        }

        $item->quality++;
    }
}
