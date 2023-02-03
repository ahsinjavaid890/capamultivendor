<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = [
            'name' => $this->product_title,
            'price' => number_format($this->prod_price, 2),
            'image' => asset("products/{$this->featured_img}"),
            'product_url' => route('website.productDetails', ['id' => $this->url])
        ];

        if ($this->category) {
            $result['category'] = $this->category()->first()->category_name;
            $result['category_url'] = route('website.cat_products', ['id' => $this->category()->first()->url]);
        }

        $result['categories'] = $this->additional['categories'] ?? [];

        return $result;
    }
}
