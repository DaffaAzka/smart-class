<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    //

    protected $fillable = [
        "name",
        "slug",
        "description",
        "image",
        'image_header',
        "category_id"
    ];

    use HasFactory;
}
