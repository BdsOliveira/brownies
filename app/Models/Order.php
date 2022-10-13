<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id_seller', 'quantitySold', 'dateSell'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'id_seller' );
    }
}
