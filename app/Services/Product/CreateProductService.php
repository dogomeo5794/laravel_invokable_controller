<?php

namespace App\Services\Product;

use App\Http\Requests\Contracts\RequestContract;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateProductService extends BaseProductService
{
    public function __invoke(RequestContract $request): JsonResource|JsonResponse
    {
        $product = $this->repository->create($request->parameters());

        $product->refresh();

        return new ProductResource($product);
    }
}
