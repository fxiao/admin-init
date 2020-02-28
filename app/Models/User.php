<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'username',
        'name',
        'phone',
        'password',
        'status',
        'avatar',
        'parent_id',
        'user_level_id'
    ];
}
