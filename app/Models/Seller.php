<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    use HasUuids;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected $fillable = ['name', 'company_id'];
}
