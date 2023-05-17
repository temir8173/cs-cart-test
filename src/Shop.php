<?php

declare(strict_types=1);

namespace Shop;

final class Shop
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if (SpecialItemNamesList::checkIfSpecialItem($item->name)) {
                $this->updateForSpecialItems($item);
                if ($item->name !== SpecialItemNamesList::MJOLNIR) {
                    $item->sell_in--;
                    $item->quality = min($item->quality, 50);
                    $item->quality = max(0, $item->quality);
                }

                continue;
            }

            $item->sell_in > 0
                ? $item->quality--
                : $item->quality -= 2;
            $item->quality = max(0, $item->quality);
            $item->sell_in--;
        }
    }

    private function updateForSpecialItems(Item $item)
    {
        switch ($item->name) {
            case SpecialItemNamesList::BLUE_CHEESE:
                $item->sell_in > 0
                    ? $item->quality++
                    : $item->quality += 2;
                break;
            case SpecialItemNamesList::MJOLNIR:
                if ($item->quality !== 80) {
                    $item->quality = 80;
                }
                break;
            case SpecialItemNamesList::CONCERT_TICKETS:
                if ($item->sell_in > 10) {
                    $item->quality++;
                } elseif($item->sell_in > 5) {
                    $item->quality += 2;
                } elseif($item->sell_in > 0) {
                    $item->quality += 3;
                } else {
                    $item->quality = 0;
                }
                break;
            case SpecialItemNamesList::MAGIC_CAKE:
                $item->sell_in > 0
                    ? $item->quality -= 2
                    : $item->quality -= 4;
                break;
        }
    }
}
