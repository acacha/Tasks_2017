<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task.
 *
 * @package App
 */
class Task extends Model
{
    protected $fillable = ['name','user_id'];
}
