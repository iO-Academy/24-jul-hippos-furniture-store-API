<?php
use FurnitureStoreApi\Services\UnitConversionService as UnitConversionService;
class UnitConversionServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testUnitConversionService_success()
    {
        $result = UnitConversionService::unitConverter('cm',1000,2000,3000);
        $this->assertSame(['height' => 300, 'width' => 200, 'depth' => 100], $result);
    }

    public function testUnitConversionService_failureOne()
    {
        $result = UnitConversionService::unitConverter('cm',0,12,12);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_failureTwo()
    {
        $result = UnitConversionService::unitConverter('cm',12,0,12);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_failureThree()
    {
        $result = UnitConversionService::unitConverter('cm',12,12,0);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_failureFour()
    {
        $result = UnitConversionService::unitConverter('horse',12,12,12);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_malformedOne()
    {
        $this->expectException(TypeError::class);
        $result = UnitConversionService::unitConverter([10], 10, 10, 10);
    }

    public function testUnitConversionService_malformedTwo()
    {
        $this->expectException(TypeError::class);
        $result = UnitConversionService::unitConverter('cm', 'ten', 10, 10);
    }

    public function testUnitConversionService_malformedThree()
    {
        $this->expectException(TypeError::class);
        $result = UnitConversionService::unitConverter('cm', 10, 'ten', 10);
    }

    public function testUnitConversionService_malformedFour()
    {
        $this->expectException(TypeError::class);
        $result = UnitConversionService::unitConverter('cm', 10, 'ten', 10);
    }
}