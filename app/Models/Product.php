<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected $fillable = ['company_id', 'name', 'price', 'description', 'status'];

}
