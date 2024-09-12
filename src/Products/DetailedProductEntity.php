<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Products\SimpleProductEntity as SimpleProductEntity;
use FurnitureStoreApi\Services\UnitConversionService;

class DetailedProductEntity extends SimpleProductEntity
{
    private int $category_id;
    private int $width;
    private int $height;
    private int $depth;
    private int $related;

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getWidth(): float
    {
        return UnitConversionService::unitConverter($this->width);
    }

    public function getHeight(): float
    {
        return UnitConversionService::unitConverter($this->height);
    }

    public function getDepth(): float
    {
        return UnitConversionService::unitConverter($this->depth);
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
            'categoryId'=>$this->getCategoryId(),
            'height'=>$this->getHeight(),
            'width'=>$this->getWidth(),
            'depth'=>$this->getDepth(),
            'related'=>$this->getRelated()
        ];
    }
}