<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'payment', 'seller_id'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
