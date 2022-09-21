<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'phone',
        'address',
        'image',
        'email',
        'description',
        'category_id',
    ];
}
