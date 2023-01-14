<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use HasUuids;

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected $fillable = ['name'];
}
