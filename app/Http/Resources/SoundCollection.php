<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SoundCollection extends ResourceCollection
{
    public $collects = SoundResource::class;
}

