<?php

namespace FurnitureStoreApi\Products;

class SimpleProductEntity
{
    protected int $id;
    protected string $name;
    protected float $price;
    protected int $stock;
    protected string $color;
    protected int $currency;
}