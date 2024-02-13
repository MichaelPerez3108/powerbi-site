<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blob extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'id',
        'content',
    ];


    protected function content(): Attribute
    {
        $attr = new Attribute(
            get: fn ($value) => $value,
            set: fn ($value) => $value
        );
        return Attribute::make(
            get: function ($value) {
                //...
                return strtoupper($value);
            },
            set: function ($value) {
                return strtolower($value);
            }
        );
    }
}
