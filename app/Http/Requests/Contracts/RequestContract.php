<?php

namespace App\Http\Requests\Contracts;

interface RequestContract
{
    public function authorized(): bool;

    public function rules(): array;

    public function parameters(): array;

    public function uuid(): string;
}
