<?php
namespace FurnitureStoreApi\Categories;
header('Content-Type: application/json; charset=utf-8');

class CategoryEntity implements \JsonSerializable
{
    private int $id;
    private string $category;
    private int $category_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getCategoryid(): int
    {
        return $this->category_id;
    }

    public function jsonSerialize(): mixed
    {
        return[
            'id'=>$this->getId(),
            'name'=>$this->getCategory(),
            'products'=>$this->getCategoryid()
        ];
    }
}