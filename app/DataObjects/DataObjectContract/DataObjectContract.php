<?php

declare(strict_types=1);

namespace App\DataObjects\DataObjectContract;

use App\Http\Requests\Contact\ContactRequest;
use Illuminate\Foundation\Http\FormRequest;

interface DataObjectContract {
    public static function make(
        FormRequest $request,
    ): self ;
}