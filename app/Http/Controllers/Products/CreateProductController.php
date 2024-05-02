<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\ServiceController;
use App\Services\Product\CreateProductService;
use Illuminate\Http\Request;

class CreateProductController extends ServiceController
{
    protected const SERVICE_CLASS = CreateProductService::class;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return parent::handle($request);
    }
}
