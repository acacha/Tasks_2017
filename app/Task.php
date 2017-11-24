<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task.
 */
class Task extends Model
{
    protected $fillable = ['name', 'user_id'];
}
