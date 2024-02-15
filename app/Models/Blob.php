<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blob extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'content',
    ];

    protected $hidden = [

    ];

    protected $cast = [

    ];

}
