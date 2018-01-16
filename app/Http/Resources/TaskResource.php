<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

/**
 * Class TaskResource.
 *
 * @package App\Http\Resources
 */
class TaskResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'completed' => (Boolean) $this->completed, // Convert string to Boolean with casting
            'description' => $this->description,
            'created_at' => $this->created_at->toDateTimeString(), // Carbon date to string
            'updated_at' => $this->updated_at, // Carbon date
        ];
    }
}
