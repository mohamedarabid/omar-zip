<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScrollCollection extends ResourceCollection
{
    public $collects = ScrollResource::class;
}
