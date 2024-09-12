<?php

namespace FurnitureStoreApi\Services;

class UnitConversionService
{
    private static string $unit;

    public static function setUnit(string $unit): void
    {
        self::$unit = $unit;
    }

    public static function unitConverter(float $measurement): float|string
    {
        if ($measurement>0)
            {
                if (self::$unit === 'cm') {
                    $measurement = $measurement / 10;

                } else if (self::$unit === 'in') {
                    $measurement = round($measurement / 25.4, 2);
                } else if (self::$unit === 'ft') {
                    $measurement = round($measurement / 304.8, 2);
                }
                return $measurement;
            }
        else
            {
                return 'Make sure you use a positive float for your measurement';
            }
    }
}