<?php

namespace FurnitureStoreApi\Products;
use FurnitureStoreApi\Products\SimpleProductEntity as SimpleProductEntity;
class DetailedProductEntity extends SimpleProductEntity
{
    private int $cid;
    private int $width;
    private int $height;
    private int $depth;
    private int $related;

}