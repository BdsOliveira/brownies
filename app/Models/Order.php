<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    protected $fillable = ['id_seller', 'quantitySold', 'dateSell'];
}
