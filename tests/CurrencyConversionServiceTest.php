<?php
use FurnitureStoreApi\Services\CurrencyConversionClass;

class CurrencyConversionServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testCurrencyConverter_success()
    {
        CurrencyConversionClass::setCurrency('USD');
        $result = CurrencyConversionClass::currencyConverter('100');
        $this->assertSame('119.00', $result);
    }

    public function testCurrencyConverter_successTwo()
    {
        CurrencyConversionClass::setCurrency('EUR');
        $result = CurrencyConversionClass::currencyConverter('100');
        $this->assertSame('116.00', $result);
    }

    public function testCurrencyConverter_successThree()
    {
        CurrencyConversionClass::setCurrency('YEN');
        $result = CurrencyConversionClass::currencyConverter('100');
        $this->assertSame('16,216.00', $result);
    }

    public function testCurrencyConverter_malformed()
    {
        $this->expectException(TypeError::class);
        $result = CurrencyConversionClass::currencyConverter([13]);
    }
}