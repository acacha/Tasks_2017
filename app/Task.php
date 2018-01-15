<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task.
 */
class Task extends Model
{
    protected $fillable = ['name', 'user_id', 'description','completed'];

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Model to array.
     *
     * Serialization: https://laravel.com/docs/5.5/eloquent-serialization#serializing-to-arrays
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'completed' => (boolean) $this->completed,
            'description' => $this->description,
            'user_id' => $this->user->id,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
