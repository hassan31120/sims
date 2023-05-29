<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotiResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'image' => asset($this->image),
            'read_at' => $this->read_at,
            'is_read' => $this->is_read(),
            'created_at' => $this->created_at,
        ];
    }

    public function is_read(): bool
    {
        return $this->read_at !== null;
    }
}
