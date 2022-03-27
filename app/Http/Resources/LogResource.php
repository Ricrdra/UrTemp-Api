<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\InputBag;

class LogResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }

}
