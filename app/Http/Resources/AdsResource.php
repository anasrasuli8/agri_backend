<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => asset($this->image),
            'phone' => $this->whenNotNull($this->phone),
            'address' => $this->whenNotNull($this->address),
            'email' => $this->whenNotNull($this->email),
            'description' => $this->whenNotNull($this->description),
            'date' => $this->whenNotNull($this->created_at?->format('d.m.Y')),
            'time' => $this->whenNotNull($this->created_at?->format('h:i')),
        ];
    }
}
