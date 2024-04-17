<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'store_id'                  => $this->store_id,
            'product_sub_category_id'   => $this->product_sub_category_id,
            'title'                     => $this->title,
            'price'                     => $this->price,
            'stock'                     => $this->stock,
            'minimum_order'             => $this->minimum_order,
            'condition'                 => $this->condition,
            'image1'                    => $this->image1,
            'image2'                    => $this->image2,
            'image3'                    => $this->image3,
            'url_video'                 => $this->url_video,
            'description'               => $this->description,
            'weight'                    => $this->weight,
            'long'                      => $this->long,
            'width'                     => $this->width,
            'tall'                      => $this->tall,
            'process_time'              => $this->process_time,
            'status_product'            => $this->status_product,
            'created_at'                => $this->created_at,
            'updated_at'                => $this->updated_at,
        ];
    }
}
