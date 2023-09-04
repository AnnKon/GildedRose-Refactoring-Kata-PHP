<?php

declare(strict_types=1);

namespace GildedRose\Models;

use GildedRose\Interfaces\ItemInterface;

class DefaultItem implements ItemInterface
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->quality <= 0) {
            $item->quality = 0;
            return;
        }

        if ($item->sellIn < 0) {
            $item->quality -= 2;
            return;
        }

        $item->quality--;
    }
}
