<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // protected $table = "companies";

    // public function sellers()
    // {
    //     return $this->hasMany(Seller::class);
    // }
    protected $fillable = ['companyName'];
}
