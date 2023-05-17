<?php


namespace Shop;


class SpecialItemNamesList
{
    public const BLUE_CHEESE = 'Blue cheese';
    public const MJOLNIR = 'Mjolnir';
    public const CONCERT_TICKETS = 'Concert tickets';
    public const MAGIC_CAKE = 'Magic cake';

    private static function map(): array
    {
        return [
            self::BLUE_CHEESE => self::BLUE_CHEESE,
            self::MJOLNIR => self::MJOLNIR,
            self::CONCERT_TICKETS => self::CONCERT_TICKETS,
            self::MAGIC_CAKE => self::MAGIC_CAKE,
        ];
    }

    public static function checkIfSpecialItem(string $name): bool
    {
        return (bool) self::map()[$name] ?? false;
    }
}
