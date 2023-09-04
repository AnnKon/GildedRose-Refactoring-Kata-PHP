<?php

declare(strict_types=1);

namespace GildedRose\Factories;

use GildedRose\Interfaces\ItemInterface;
use GildedRose\Models\AgedBrie;
use GildedRose\Models\BackstagePass;
use GildedRose\Models\Conjured;
use GildedRose\Models\DefaultItem;
use GildedRose\Models\Item;
use GildedRose\Models\Sulfuras;

class ItemFactory
{
    public function createModelForItem(Item $item): ItemInterface
    {
        if ($this->isItemAgedBrie($item)) {
            return new AgedBrie();
        }
        if ($this->isItemBackstagePass($item)) {
            return new BackstagePass();
        }
        if ($this->isItemSulfuras($item)) {
            return new Sulfuras();
        }
        if ($this->isItemConjured($item)) {
            return new Conjured();
        }

        return new DefaultItem();
    }

    private function isItemAgedBrie(Item $item): bool
    {
        return $item->name === 'Aged Brie';
    }

    private function isItemBackstagePass(Item $item): bool
    {
        return $item->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    private function isItemSulfuras(Item $item): bool
    {
        return $item->name === 'Sulfuras, Hand of Ragnaros';
    }

    private function isItemConjured(Item $item): bool
    {
        return $item->name === 'Conjured Mana Cake';
    }
}
