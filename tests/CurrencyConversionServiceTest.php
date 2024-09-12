<?php
use FurnitureStoreApi\Services\CurrencyConversionClass;

class CurrencyConversionServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testCurrencyConverter_success()
    {
        $result = CurrencyConversionClass::currencyConverter('100');
        $this->assertSame('100.00', $result);
    }

    public function testCurrencyConverter_malformed()
    {
        $this->expectException(TypeError::class);
        $result = CurrencyConversionClass::currencyConverter([13]);
    }
}