<?php

namespace App\Services\Product;

use App\Repository\Product\ProductRepositoryInterface;
use App\Services\ServiceInterface;

abstract class BaseProductService implements ServiceInterface
{
    public function __construct(protected readonly ProductRepositoryInterface $repository)
    {

    }
}
