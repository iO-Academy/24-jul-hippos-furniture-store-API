<?php

namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Products\SimpleProductEntity as SimpleProductEntity;
class DetailedProductEntity extends SimpleProductEntity
{
    private int $category_id;
    private int $width;
    private int $height;
    private int $depth;
    private int $related;

}