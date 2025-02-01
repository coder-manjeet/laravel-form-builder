<?php

namespace CoderManjeet\LaravelFormBuilder\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormFieldResource extends JsonResource
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
            'name' => $this->name,
            'label' => $this->label,
            'type' => $this->type,
            'description' => $this->description,
            'placeholder' => $this->placeholder,
            'default_value' => $this->default_value,
            'options' => FieldOptionResource::collection($this->options),
            'required' => $this->required,
            'default_value' => $this->default_value,
            'settings' => $this->settings,
            'children' => FormFieldResource::collection($this->children),
        ];
    }
}
