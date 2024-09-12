<?php

namespace FurnitureStoreApi\Services;
use FurnitureStoreApi\Exceptions\InvalidUnitOfMeasureException;

class UnitConversionService
{
    private static string $unit = 'mm';

    public static function setUnit(string $unit): void
    {
        if (in_array($_GET['unit'], ['mm', 'cm', 'in', 'ft']))
        {
            self::$unit = $unit;
        }
        else
        {
            throw new InvalidUnitOfMeasureException();
        }
    }

    public static function unitConverter(float $measurement): float|string
    {
        if ($measurement>0)
            {
                if (self::$unit === 'cm') {
                    $measurement = round($measurement / 10, 2);

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