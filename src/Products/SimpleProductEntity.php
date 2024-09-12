<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();

class SimpleProductEntity implements \JsonSerializable
{
    protected int $id;
    protected string $name;
    protected float $price;
    protected int $stock;
    protected string $color;
    protected int $currency;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getCurrency(): int
    {
        return $this->currency;
    }

    public function jsonSerialize(): mixed
    {
        return[
            'id'=>$this->getId(),
            'price'=>$this->getPrice(),
            'stock'=>$this->getStock(),
            'color'=>$this->getColor()
        ];
    }
}