<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Repository\BaseRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Model $product, array $data): bool
    {
        if (!$product instanceof Product) {
            throw new \InvalidArgumentException("Expected model of type Product, ".get_class($product)." received instead.");
        }

        return $product->update($data);
    }

    public function delete(Model $product): bool
    {
        return $product->delete();
    }

    public function find(int $id): Product
    {
        return Product::find($id);
    }

    public function all(): iterable
    {
        return Product::all();
    }

    public function findByUuid(string $uuid): ?Product
    {
        return Product::where("uuid", $uuid)->first();
    }
}
