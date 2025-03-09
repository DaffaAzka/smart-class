<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProductContent extends Model
{
    //

    protected $fillable = [
        "product_id","img_source","header","content","order"
    ];

    use HasFactory;
}
