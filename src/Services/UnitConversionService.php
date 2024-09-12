<?php

namespace FurnitureStoreApi\Services;

class UnitConversionService
{
    private static string $unit;

    public static function getUnit(): string
    {
        return self::$unit;
    }

    public static function setUnit(string $unit): void
    {
        self::$unit = $unit;
    }

    public static function unitConverter(string $unit, int $depth, int $width, int $height): array|string
    {
        if ((in_array($unit, ['mm', 'cm', 'in', 'ft'])) && $depth>0 && $width>0 && $height>0)
            {
                if ($unit === 'cm') {
                    $depth = $depth / 10;
                    $width = $width / 10;
                    $height = $height / 10;
                } else if ($unit === 'in') {
                    $depth = round($depth / 25.4, 2);
                    $width = round($width / 25.4, 2);
                    $height = round($height / 25.4, 2);
                } else if ($unit === 'ft') {
                    $depth = round($depth / 304.8, 2);
                    $width = round($width / 304.8, 2);
                    $height = round($height / 304.8, 2);
                } else if ($unit === 'mm') {
                    return $dimensionsArray = ['height' => $height, 'width' => $width, 'depth' => $depth];
                }
                return $dimensionsArray = ['height' => $height, 'width' => $width, 'depth' => $depth];
            }
        else
            {
                return 'Make sure you have used the right dimensions or units in the parameters';
            }
    }
}