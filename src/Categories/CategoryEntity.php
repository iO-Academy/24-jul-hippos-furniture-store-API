<?php
namespace FurnitureStoreApi\Categories;
use FurnitureStoreApi\Services\HeaderService;
HeaderService::setHeaders();

class CategoryEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $products;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProducts(): int
    {
        return $this->products;
    }

    public function jsonSerialize(): mixed
    {
        return[
            'id'=>$this->getId(),
            'name'=>$this->getName(),
            'products'=>$this->getProducts()
        ];
    }
}