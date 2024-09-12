<?php
namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Products\SimpleProductEntity as SimpleProductEntity;
use FurnitureStoreApi\Services\UnitConversionService;

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

    public function setWidth(int $width): void
    {
        $this->width = $width;
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
        $dimensions = UnitConversionService::unitConverter($_GET['unit'], $this->getDepth(),$this->getWidth(),$this->getHeight());
        return[
            'id'=>$this->getId(),
            'price'=>$this->getPrice(),
            'stock'=>$this->getStock(),
            'color'=>$this->getColor(),
            'categoryId'=>$this->getCategoryId(),
            'height'=>$dimensions['height'],
            'width'=>$dimensions['width'],
            'depth'=>$dimensions['depth'],
            'related'=>$this->getRelated()
        ];
    }
}