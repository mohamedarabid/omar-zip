<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SoundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'secound_name' => $this->secound_name,
            'code' => $this->code,
            'desc' => $this->desc,
            'url' => $this->url,
            'duration' => $this->duration,
            'sound_link' => $this->sound_link,
            'image' => uploaded_asset($this->image),
            'catgeory' => new CategoryResource($this->catgeory),
            'type' => new TypeResource($this->type),

        ];
    }
}
