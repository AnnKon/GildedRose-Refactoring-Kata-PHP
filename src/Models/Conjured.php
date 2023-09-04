<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;

class Conjured implements ItemInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality <= 0) {
            $item->quality = 0;
            return;
        }

        if ($item->sellIn < 0) {
            $item->quality -= 4;
            return;
        }

        $item->quality -= 2;
    }
}
