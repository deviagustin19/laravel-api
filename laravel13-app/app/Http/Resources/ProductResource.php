<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->nama,
            'price' => $this->harga,
            'category' => $this->category?->nama,
            'category_id' => $this->category_id,
            'stok' => $this->stok,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
