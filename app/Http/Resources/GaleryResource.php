<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GaleryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'post' => [
                'id' => $this->post->id ?? null,
                'judul' => $this->post->judul ?? null,
                'kategori_id' => $this->post->kategori_id ?? null,
                'isi' => $this->post->isi ?? null,
                'petugas_id' => $this->post->petugas_id ?? null,
                'status' => $this->post->status ?? null,
            ],
            'position' => $this->position,
            'status' => $this->status,
            'image_path' => $this->image_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
} 