<?php
namespace FurnitureStoreApi\Categories;
header('Content-Type: application/json; charset=utf-8');

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

    public function getCategoryid(): int
    {
        return $this->products;
    }

    public function jsonSerialize(): mixed
    {
        return[
            'id'=>$this->getId(),
            'name'=>$this->getName(),
            'products'=>$this->getCategoryid()
        ];
    }
}