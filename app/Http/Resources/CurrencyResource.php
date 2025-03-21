<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'from_currency' => $this->resource['from_currency'],
            'to_currency' => $this->resource['to_currency'],
            'amount' => $this->resource['amount'],
            'converted_amount' => $this->resource['converted_amount'],
            'rate' => $this->resource['rate'],
        ];
    }
}
