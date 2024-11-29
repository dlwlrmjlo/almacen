<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'owner'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner');  
    }
}
