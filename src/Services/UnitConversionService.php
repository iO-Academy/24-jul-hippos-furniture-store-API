<?php

namespace FurnitureStoreApi\Services;

use FurnitureStoreApi\Products\DetailedProductEntity;

class UnitConversionService
{
    public static function widthUnitConverter($unit,$width): float
    {
        if ($unit === 'cm')
        {
            $width = $width/10;
        }
        else if ($unit === 'in')
        {
            $width = round($width/25.4, 2);
        }
        else if ($unit === 'ft')
        {
            $width = $width/304.8;
        }
        return $width;
    }

    public static function heightUnitConverter($unit,$height): float
    {
        if ($unit === 'cm')
        {
            $height = $height/10;
        }
        else if ($unit === 'in')
        {
            $height = round($height/25.4, 2);
        }
        else if ($unit === 'ft')
        {
            $height = $height/304.8;
        }
        return $height;
    }

    public static function depthUnitConverter($unit,$depth): float
    {
        if ($unit === 'cm')
        {
            $depth = $depth/10;
        }
        else if ($unit === 'in')
        {
            $depth = round($depth/25.4, 2);
        }
        else if ($unit === 'ft')
        {
            $depth = $depth/304.8;
        }
        return $depth;    }
}
