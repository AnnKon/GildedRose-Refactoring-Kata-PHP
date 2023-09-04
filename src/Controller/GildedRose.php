<?php

declare(strict_types=1);

namespace GildedRose\Controller;

use GildedRose\Factories\ItemFactory;
use GildedRose\Models\Item;

class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $qualityResolver = (new ItemFactory())->createModelForItem($item);
            $qualityResolver->update($item);
        }
    }
}
