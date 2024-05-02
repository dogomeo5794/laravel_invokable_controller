<?php

namespace App\Http\Requests;

use App\Http\Requests\Contracts\RequestContract;
use App\Traits\RequestHelpers;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest implements RequestContract
{
    use RequestHelpers;

    public function parameters(): array
    {
        return $this->all();
    }

    public function authorized(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [];
    }
}
