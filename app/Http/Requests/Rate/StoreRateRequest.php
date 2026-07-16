<?php

namespace App\Http\Requests\Rate;

use Illuminate\Foundation\Http\FormRequest;

class StoreRateRequest extends FormRequest
{
    public function authorize(): bool
    {
<<<<<<< HEAD
        return $this->user()->hasRole('admin');
=======
        return $this->user()->hasRole('admin|manager');
>>>>>>> 7f212d9de6c10c5f1227a5e90633dd57e257b7c5
    }

    public function rules(): array
    {
        return [
            'origin_city' => ['required', 'string', 'max:255'],
            'destination_city' => ['required', 'string', 'max:255'],
            'price_per_kg' => ['required', 'numeric', 'min:0'],
            'estimated_days' => ['required', 'integer', 'min:0'],
        ];
    }
}
