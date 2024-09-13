<?php

use FurnitureStoreApi\Services\UnitConversionService as UnitConversionService;
class UnitConversionServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testUnitConversionService_successOne()
    {
        UnitConversionService::setUnit('cm');
        $result = UnitConversionService::unitConverter(1000);
        $this->assertSame(100.0, $result);
    }
    public function testUnitConversionService_successTwo()
    {
        UnitConversionService::setUnit('in');
        $result = UnitConversionService::unitConverter(1000);
        $this->assertSame(39.37, $result);
    }
    public function testUnitConversionService_successThree()
    {
        UnitConversionService::setUnit('ft');
        $result = UnitConversionService::unitConverter(1000);
        $this->assertSame(3.28, $result);
    }


    public function testUnitConversionService_failureOne()
    {
        $result = UnitConversionService::unitConverter(-500);
        $this->assertSame('Make sure you use a positive float for your measurement',$result);
    }

    public function testUnitConversionService_malformedOne()
    {
        $this->expectException(TypeError::class);
        $result = UnitConversionService::unitConverter('ten');
    }
}