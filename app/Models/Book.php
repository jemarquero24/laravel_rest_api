<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'category',
        'publication_year',
        'copies_owned',
    ];

    protected $casts = [
        'publication_year' => 'integer',
        'copies_owned' => 'integer',
    ];
}
