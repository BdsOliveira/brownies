<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(fn(Product $product) => $product->id = (string) Uuid::uuid4());
    }
}
