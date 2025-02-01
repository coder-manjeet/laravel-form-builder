<?php

namespace CoderManjeet\LaravelFormBuilder\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FieldOptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'field_id' => $this->form_field_id,
            'label' => $this->value,
            'value' => $this->name,
        ];
    }
}
