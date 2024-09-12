<?php
use FurnitureStoreApi\Services\UnitConversionService as UnitConversionService;
class UnitConversionServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testUnitConversionService_success()
    {
        $dimensions = new UnitConversionService();
        $result = $dimensions->unitConverter('cm',1000,2000,3000);
        $this->assertSame(['height' => 300, 'width' => 200, 'depth' => 100], $result);
    }

    public function testUnitConversionService_failureOne()
    {
        $dimensions = new UnitConversionService();
        $result = $dimensions->unitConverter('cm',0,12,12);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_failureTwo()
    {
        $dimensions = new UnitConversionService();
        $result = $dimensions->unitConverter('cm',12,0,12);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_failureThree()
    {
        $dimensions = new UnitConversionService();
        $result = $dimensions->unitConverter('cm',12,12,0);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_failureFour()
    {
        $dimensions = new UnitConversionService();
        $result = $dimensions->unitConverter('horse',12,12,12);
        $this->assertSame('Make sure you have used the right dimensions or units in the parameters',$result);
    }

    public function testUnitConversionService_malformedOne()
    {
        $dimensions = new UnitConversionService();
        $this->expectException(TypeError::class);
        $result = $dimensions->unitConverter([10], 10, 10, 10);
    }

    public function testUnitConversionService_malformedTwo()
    {
        $dimensions = new UnitConversionService();
        $this->expectException(TypeError::class);
        $result = $dimensions->unitConverter('mm', 'ten', 10, 10);
    }

    public function testUnitConversionService_malformedThree()
    {
        $dimensions = new UnitConversionService();
        $this->expectException(TypeError::class);
        $result = $dimensions->unitConverter('mm', 10, 'ten', 10);
    }

    public function testUnitConversionService_malformedFour()
    {
        $dimensions = new UnitConversionService();
        $this->expectException(TypeError::class);
        $result = $dimensions->unitConverter('mm', 10, 10, 'ten');
    }
}