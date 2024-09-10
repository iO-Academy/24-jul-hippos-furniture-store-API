<?php

namespace FurnitureStoreApi\Categories;
header('Content-Type: application/json; charset=utf-8');

class CategoryEntity implements \JsonSerializable
{
    private int $id;
    private string $category;
    private int $cid;



    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
    public function getCid(): int
    {
        return $this->cid;
    }

    public function jsonSerialize(): mixed
    {
        return[
            'id'=>$this->getId(),
            'category'=>$this->getCategory(),
            'cid'=>$this->getCid()
        ];
    }

}