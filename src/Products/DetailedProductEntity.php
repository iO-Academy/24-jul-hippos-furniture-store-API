<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Products\SimpleProductEntity as SimpleProductEntity;

class DetailedProductEntity extends SimpleProductEntity
{
    protected int $category_id;
    protected int $width;
    protected int $height;
    protected int $depth;
    protected int $related;

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function getRelated(): int
    {
        return $this->related;
    }

    public function jsonSerialize(): mixed
    {
        return[
            'id'=>$this->getId(),
            'price'=>$this->getPrice(),
            'stock'=>$this->getStock(),
            'color'=>$this->getColor(),
            'category_id'=>$this->getCategoryId(),
            'width'=>$this->getWidth(),
            'height'=>$this->getHeight(),
            'depth'=>$this->getDepth(),
            'related'=>$this->getRelated()
        ];
    }
}